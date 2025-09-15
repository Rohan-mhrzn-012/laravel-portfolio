<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SkillController;
use App\Http\Middleware\AuthCheckMiddleware;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['guest']], function () {
    Route::get('/register', [AuthController::class, 'registerPage']);
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/user' , function(){
        return view('user');
    });

    Route::get("/user_role", function(){
        return view("user_role");
    });



    //Skills routes
    Route::get('/skills', [SkillController::class,'index'])->name('skills');
    Route::get('/skills/create', [SkillController::class,'create_form'])->name('skills.create');
    Route::post('/skills/create',[SkillController::class,'store']);

    //Experience Routes
    Route::get('/experience', function () {
        return view('experience');
    });

    //Project routes
    Route::get('/projects', function () {
        return view('projects');
    });
});

Route::get('/admin', function(){
    return view('admin');
});

Route::get('/user_post', [PostController::class, 'withPosts'])->name('user_post');

Route::get('/post_create', [PostController::class, 'index'] );

Route::post('/post_create', [PostController::class, 'store'])->name("posts.store");
