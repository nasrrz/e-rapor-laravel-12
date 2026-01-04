<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\SubjectController;
use App\Models\Student;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseSectionController;
use App\Http\Controllers\GradeController;

use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Admin / Master Data Routes
    Route::resource('academic-years', AcademicYearController::class);
    Route::resource('classes', SchoolClassController::class); // Parameters will be 'class'
    Route::resource('subjects', SubjectController::class); // Parameters will be 'subject'
    Route::resource('students', StudentController::class);
    Route::resource('users', UserController::class);

    // Academic / Teacher Routes
    Route::resource('course-sections', CourseSectionController::class);
    Route::resource('grades', GradeController::class);
});
