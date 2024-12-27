<?php
// app/Http/Controllers/Auth/StudentRegisterController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class StudentRegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('student.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'rollno' => 'required|unique:students',
            'email' => 'required|email|unique:students',
            'password' => 'required|confirmed|min:8',
            'phoneno' => 'required'
        ]);

        $student = Student::where('email', $request->email)->first();
        if ($student && !$student->active) {
            // Student has logged out, re-register
            $student->name = $request->input('name');
            $student->rollno = $request->input('rollno');
            $student->password = Hash::make($request->input('password'));
            $student->phoneno = $request->input('phoneno');
            $student->active = true;
            $student->save();

            return Redirect::route('student.login')->with('success', 'Re-registration successful! Please log in.');
        }


        Student::create([
            'name' => $request->input('name'),
            'rollno' => $request->input('rollno'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phoneno' => $request->input('phoneno'),
            'active' => true,
        ]);

        return Redirect::route('student.login')->with('success', 'Registration successful! Please log in.');
    }
}




