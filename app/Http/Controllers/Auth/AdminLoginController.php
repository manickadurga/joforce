<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $admin = \App\Models\Admin::where('email', $credentials['email'])->first();
        if (!$admin || !Hash::check($request->password, $admin->password) || !$admin->active) {
            return redirect()->back()->withErrors(['email' => 'Invalid credentials or account inactive']);
        }

        // Attempt to log the admin in
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('/admin-dashboard');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $admin->active = false;
        $admin->save();

        Auth::guard('admin')->logout();

        return redirect()->route('home');
    }
}



