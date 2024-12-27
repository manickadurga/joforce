<?php

use App\Http\Controllers\Auth\AdminRegisterController;
use App\Http\Controllers\Auth\StudentRegisterController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\StudentLoginController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentDashboardController;


Route::get('/', function () {
    return view('home'); // Ensure you have a 'home.blade.php' view file in the 'resources/views' directory
})->name('home');

// Registration Routes
Route::get('/admin-register', [AdminRegisterController::class, 'showRegistrationForm'])->name('admin.register');
Route::post('/admin-register', [AdminRegisterController::class, 'register'])->name('admin.register.submit');

//Route::get('/student-register', [StudentRegisterController::class, 'showRegistrationForm'])->name('student.register');
//Route::post('/student-register', [StudentRegisterController::class, 'register'])->name('student.register.submit');

// Login Routes
Route::get('/admin-login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin-login', [AdminLoginController::class, 'login'])->name('admin.login.submit');

//Route::get('/student-login', [StudentLoginController::class, 'showLoginForm'])->name('student.login');
//Route::post('/student-login', [StudentLoginController::class, 'login'])->name('student.login.submit');

// Registration and Login Routes
Route::get('/student-register', [StudentRegisterController::class, 'showRegistrationForm'])->name('student.register');
Route::post('/student-register', [StudentRegisterController::class, 'register'])->name('student.register.post');

Route::get('/student-login', [StudentLoginController::class, 'showLoginForm'])->name('student.login');
Route::post('/student-login', [StudentLoginController::class, 'login'])->name('student.login.post');

// Admin Dashboard Route
Route::get('/admin-dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::post('/student/update/{id}', [AdminDashboardController::class, 'update'])->name('student.update');
// Update Student Route
Route::put('/admin-student/update/{id}', [AdminDashboardController::class, 'update'])->name('student.update');

Route::delete('/student/{id}', [AdminDashboardController::class, 'destroy'])->name('student.destroy');
Route::get('/student/{id}/edit', [AdminDashboardController::class, 'edit'])->name('student.edit');

// Update the student's details
//Route::put('/student/{id}', [AdminDashboardController::class, 'update'])->name('student.update');


// Student Routes
Route::get('/admin-student/add', [StudentController::class, 'create'])->name('student.create');
Route::post('/admin-student/store', [StudentController::class, 'store'])->name('student.store');
Route::get('/admin-student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
Route::post('/admin-student/update/{id}', [StudentController::class, 'update'])->name('student.update');
Route::get('/admin-student/delete/{id}', [StudentController::class, 'destroy'])->name('student.delete');
Route::get('/admin-student/add-marks/{id}', [StudentController::class, 'addMarks'])->name('student.addMarks');
Route::post('/admin-student/save-marks/{id}', [StudentController::class, 'saveMarks'])->name('student.saveMarks');
Route::get('/admin-student/download-marksheet/{id}', [StudentController::class, 'downloadMarksheet'])->name('student.downloadMarksheet');


// Logout Routes

Route::post('/admin-logout', [AdminDashboardController::class, 'logout'])->name('admin.logout');
//Route::post('/admin/logout', [AdminLogoutController::class, 'logout'])->name('admin.logout');

Route::get('/student-dashboard', [StudentDashboardController::class, 'index'])->name('student.dashboard')->middleware('auth:web');
Route::get('/download-marksheet/{id}', [StudentDashboardController::class, 'downloadMarksheet'])->name('student.downloadMarksheet');


Route::post('/student-logout', [StudentDashboardController::class, 'logout'])->name('student.logout');
