<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class StudentLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('student.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        $student = \App\Models\Student::where('email', $credentials['email'])->first();
    //   $student = Student::where('email', $request->input('email'))->first();

    if ($student) {
        // Check if the password needs rehashing
        if (!Hash::check($request->input('password'), $student->password)) {
            return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
        }

        // If the password needs rehashing, update it
        if (Hash::needsRehash($student->password)) {
            $student->password = Hash::make($request->input('password'));
            $student->save();
        }

        if (!$student || !Hash::check($request->password, $student->password) || !$student->active) {
            return redirect()->back()->withErrors(['email' => 'Invalid credentials or account inactive']);
        }

        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->intended('/student-dashboard');
        }

     //   Auth::guard('web')->login($student);
    //    return redirect()->intended('/student-dashboard');
    }

    return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
}
public function logout()
{
    $student = Auth::guard('web')->user();
    $student->active = false;
    $student->save();

    Auth::guard('web')->logout();

    return redirect()->route('home');
}


}



