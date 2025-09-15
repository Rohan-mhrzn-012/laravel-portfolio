<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['guest']], function () {
    Route::get('/register', [AuthController::class, 'registerPage']);
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::group([ 'prefix' => 'admin','middleware' => ['auth']], function () {
    Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');
    
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

    //Experience Routes
    Route::get('/experience', [ExperienceController::class,'index'])->name('experience');
    Route::get('/experience/create',[ExperienceController::class,'create_form'])->name('experience.create');
    Route::post('/experience/create',[ExperienceController::class,'store']);

    //Project routes
    Route::get('/projects', [ProjectController::class,'index'])->name('project');
    Route::get('/projects/create',[ProjectController::class,'create_form'])->name('projects.create');
    Route::post('/projects/create',[ProjectController::class,'create']);

    //Students routes
    Route::get('/students',[StudentController::class,'index'])->name('students.index');
    Route::get('/students/create',[StudentController::class,'create'])->name('students.create');
    Route::post('/students',[StudentController::class,'store'])->name('students.store');

    //Author routes
    Route::get('/authors',[AuthorController::class,'index'])->name('authors.index');
    Route::get('/authors/create',[AuthorController::class,'create'])->name('authors.create');
    Route::post('/authors',[AuthorController::class,'store'])->name('authors.store');

    Route::get('/user_post', [PostController::class, 'withPosts'])->name('user_post');
    Route::get('/post_create', [PostController::class, 'index'] );
    Route::post('/post_create', [PostController::class, 'store'])->name("posts.store");

    Route::get('/admin', function(){
        return view('admin');
    });
});

