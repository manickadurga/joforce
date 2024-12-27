<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminRegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.admin-register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins',
            'password' => 'required|confirmed|min:8',
        ]);

        $admin = Admin::where('email', $request->email)->first();
        if ($admin && !$admin->active) {
            // Admin has logged out, re-register
            $admin->name = $request->input('name');
            $admin->password = Hash::make($request->input('password'));
            $admin->active = true;
            $admin->save();

            return Redirect::route('admin.login')->with('success', 'Re-registration successful! Please log in.');
        }

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->active = true;
        $admin->save();

        return Redirect::route('admin.login')->with('success', 'Registration successful! Please login.');
    }
}
