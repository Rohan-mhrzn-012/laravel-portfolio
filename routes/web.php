<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;

// Homepage
Route::get('/', function () {
    return view('welcome');
});

// Authentication
Route::get('/register', [AuthController::class, 'registerPage'])->name('register.page');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'loginPage'])->name('login.page');

// User routes
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user_role', function () {
    return view('user_role');
});

// Static pages
Route::view('/skills', 'skills')->name('skills');
Route::view('/experience', 'experience')->name('experience');
Route::view('/projects', 'projects')->name('projects');
Route::view('/admin', 'admin')->name('admin');

// Posts
Route::get('/user_post', [PostController::class, 'withPosts'])->name('user_post');
Route::get('/post_create', [PostController::class, 'index'])->name('posts.create');
Route::post('/post_create', [PostController::class, 'store'])->name('posts.store');

// Students
Route::get('/student', [StudentController::class, 'index'])->name('student.index');
Route::get('/student_create', [StudentController::class, 'create'])->name('student.create');
Route::post('/student_create', [StudentController::class, 'store'])->name('students.store');
Route::get('/student/{student}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::put('/student/{student}', [StudentController::class, 'update'])->name('student.update');
Route::get('/student/{student}/view', [StudentController::class, 'show'])->name('student.view');
Route::get('/student/search', [StudentController::class, 'search'])->name('student.search');
Route::delete('/student/{student}', [StudentController::class, 'destroy'])->name('student.destroy');


// Courses
Route::get('/course', [CourseController::class, 'index'])->name('courses.index');
