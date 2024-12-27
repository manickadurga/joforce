<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

use Illuminate\Support\Facades\Auth;
class AdminDashboardController extends Controller
{
    // Display the dashboard with the list of students
    public function index()
    {
        $students = Student::all();
        return view('admin.dashboard', compact('students'));
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('admin.edit', compact('student'));
    }

    // Update student details
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'rollno' => 'required',
            'email' => 'required|email',
            'phoneno' => 'required'
        ]);

        $student = Student::findOrFail($id);
        $student->name = $request->name;
        $student->rollno = $request->rollno;
        $student->email = $request->email;
        $student->phoneno = $request->phoneno;
        $student->save();

        return redirect()->route('admin.dashboard')->with('success', 'Student updated successfully!');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Student deleted successfully!');
    }

    public function logout(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $admin->active = false;
        $admin->save();
    
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect()->route('home');
    }
}


