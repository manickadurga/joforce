<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLogoutController extends Controller
{
    public function logout()
    {
        $admin = Auth::user();
        if ($admin) {
            $admin->active = false; // Set user as inactive
            $admin->save();
        }

        Auth::logout(); // Log out the user
        return redirect()->route('admin.login'); // Redirect to login page
    }
}

