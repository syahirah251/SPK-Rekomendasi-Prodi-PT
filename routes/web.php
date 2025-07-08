<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AcademicController;
use App\Http\Controllers\AcademicProgramController;
use App\Http\Controllers\MinatController;
use App\Http\Controllers\BakatController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentRankingController;


Route::resource('home', HomeController::class);

Route::resource('students', StudentController::class);
Route::resource('academics', AcademicController::class);
Route::post('/academics/store', [AcademicController::class, 'store'])->name('academics.store');
Route::resource('minat', MinatController::class);
Route::resource('bakat', BakatController::class);
Route::resource('prodi', AcademicProgramController::class);
Route::get('/rekom', [StudentRankingController::class, 'index'])->name('rekom.index');

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');

// Show login form (GET method)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Handle login process (POST method)
Route::post('/login', [AuthController::class, 'login']);

// Handle logout (POST method)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Show registration form (GET method)
Route::get('/register', [AuthController::class, 'showRegistrationForm']);

// Handle registration (POST method)
Route::post('/register', [AuthController::class, 'register']);


Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
