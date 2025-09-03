<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'registerPage']);

Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'loginPage']);

Route::get('/user' , [UserController::class, 'userpage']);

Route::get("/user_role", function(){
    return view("user_role");
});
Route::get('/skills', function () {
    return view('skills');
});

Route::get('/experience', function () {
    return view('experience');
});

Route::get('/projects', function () {
    return view('projects');
});

Route::get('/admin', function(){
    return view('admin');
});
