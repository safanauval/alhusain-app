<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassListController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PdfController;

// Login
Route::get('/', function () {
    return view('auth/login');
});
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
// Login End

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Logout End

// Dashboard 
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth.custom');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');
});

///// Using middleware alias
Route::middleware(['auth.custom'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');

});

///// OR using fully qualified class name
Route::middleware([\App\Http\Middleware\CustomAuth::class])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');
});
// Dashboard End

// Student
Route::get('/student', [StudentController::class, 'student']);
Route::get('/student', function () {
    return view('student');
});
Route::resource('students', StudentController::class)->only([
    'index',
    'store',
    'update',
    'destroy'
]);
// Student End

// Classlist
Route::get('/classlist', [ClassListController::class, 'classlist']);
// Classlist End

// Report
Route::get('/reports/index', [ReportController::class, 'index']);
// routes/web.php
Route::get('/reports/pdf/{nisn}', [ReportController::class, 'printPDF'])->name('reports.pdf');
Route::resource('reports', ReportController::class)->only([
    'index',
    'store',
    'update',
    'destroy'
]);
// Report End


