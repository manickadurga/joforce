<?php


namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use PDF;

class StudentController extends Controller
{
    public function create()
    {
        return view('admin.add-student');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'rollno' => 'required|unique:students',
            'email' => 'required|email|unique:students',
            'password' => 'required',
            'phoneno' => 'required'
        ]);

        Student::create($request->all());
        return redirect()->route('admin.dashboard')->with('success', 'Student added successfully!');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('admin.edit-student', compact('student'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'rollno' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:8', // Password is optional for update
            'phoneno' => 'required|string|max:15',
            'marks.tamil' => 'required|integer|min:0|max:100',
            'marks.english' => 'required|integer|min:0|max:100',
            'marks.social' => 'required|integer|min:0|max:100',
            'marks.science' => 'required|integer|min:0|max:100',
        ]);

        // Find the student record
        $student = Student::findOrFail($id);

        // Retrieve and calculate the total and grade
        $marks = $request->input('marks');
        $total = array_sum($marks);
        $grade = $this->calculateGrade($total);

        // Update student record with new data
        $student->update([
            'name' => $request->input('name'),
            'rollno' => $request->input('rollno'),
            'email' => $request->input('email'),
            'phoneno' => $request->input('phoneno'),
            'marks' => json_encode($marks), // Save marks as JSON
            'total' => $total,
            'grade' => $grade,
        ]);

        // Redirect to the dashboard with success message
        return redirect()->route('admin.dashboard')->with('success', 'Student updated successfully!');
    }

    protected function calculateGrade($total)
    {
        // Implement grade calculation logic here
        if ($total >= 360) {
            return 'A';
        } elseif ($total >= 320) {
            return 'B';
        } elseif ($total >= 280) {
            return 'C';
        } else {
            return 'D';
        }
    }

    public function destroy($id)
    {
        Student::findOrFail($id)->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Student deleted successfully!');
    }

    public function addMarks($id)
    {
        $student = Student::findOrFail($id);
        return view('admin.add-marks', compact('student'));
    }

    public function saveMarks(Request $request, $id)
    {
        $request->validate([
            'marks' => 'required|array',
            'marks.*' => 'required|numeric',
            'total' => 'required|numeric',
            'grade' => 'required|string'
        ]);

        $student = Student::findOrFail($id);
        $student->marks = json_encode($request->marks);
        $student->total = $request->total;
        $student->grade = $request->grade;
        $student->save();

        return redirect()->route('admin.dashboard')->with('success', 'Marks added successfully!');
}

    public function downloadMarksheet($id)
    {
        $student = Student::findOrFail($id);

        // Decode the marks JSON to an associative array
        $marks = json_decode($student->marks, true);

        // Calculate the total and grade (if needed)
        $total = array_sum($marks);
        $grade = $this->calculateGrade($total);

        // Prepare data for the PDF
        $data = [
            'student' => $student,
            'marks' => $marks,
            'total' => $total,
            'grade' => $grade,
        ];

        // Load the view and generate PDF
        $pdf = PDF::loadView('student.marksheet', $data);

        // Download the generated PDF
        return $pdf->download('marksheet_' . $student->rollno . '.pdf');
    }
 }



