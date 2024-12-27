<?php



namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Student;

use Barryvdh\DomPDF\Facade\Pdf;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $student = Auth::user(); // The logged-in student

        return view('student.dashboard', compact('student'));
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

    private function calculateGrade($total)
    {
        // Simple grade calculation logic
        if ($total >= 90) return 'A';
        if ($total >= 80) return 'B';
        if ($total >= 70) return 'C';
        if ($total >= 60) return 'D';
        return 'F';
    }

    public function logout(Request $request)
{
    $student = Auth::guard('web')->user();
    $student->active = false;
    $student->save();

    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('home');
}

}


