<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ProgrammerController;
use App\Http\Controllers\CourseController;


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'registerPage']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'loginPage']);
Route::post('/login', [AuthController::class, 'login']);



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
Route::get('/experience', [ExperienceController::class,'index'])->name('experience');
Route::get('/experience/create',[ExperienceController::class,'create_form'])->name('experience.create');
Route::post('/experience/create',[ExperienceController::class,'store']);
Route::delete('/experience/{id}',[ExperienceController::class,'destroy'])->name('experience.destroy');
Route::get('/experience/view/{id}',[ExperienceController::class,'show'])->name('experience.view');

//Project routes
Route::get('/projects', [ProjectController::class,'index'])->name('project');
Route::get('/projects/create',[ProjectController::class,'create_form'])->name('projects.create');
Route::post('/projects/create',[ProjectController::class,'create']);
Route::get('/projects/edit/{id}',[ProjectController::class,'edit'])->name('projects.edit');
Route::put('/projects/edit/{id}',[ProjectController::class,'update'])->name('projects.update');
Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');
Route::get('/projects/view/{id}',[ProjectController::class,'show'])->name('projects.show');



//Students routes
Route::get('/students',[StudentController::class,'index'])->name('students.index');
Route::get('/students/create',[StudentController::class,'create'])->name('students.create');
Route::post('/students',[StudentController::class,'store'])->name('students.store');

//Author routes
Route::get('/authors',[AuthorController::class,'index'])->name('authors.index');
Route::get('/authors/create',[AuthorController::class,'create'])->name('authors.create');
Route::post('/authors',[AuthorController::class,'store'])->name('authors.store');

//Programmers routes
Route::get('/programmers',[ProgrammerController::class,'index'])->name('programmers.index');
Route::get('/programmers/create',[ProgrammerController::class,'create'])->name('programmers.create');
Route::post('/programmers',[ProgrammerController::class,'store'])->name('programmers.store');

//Course routes
Route::get('/courses',[CourseController::class,'index'])->name('courses.index');
Route::get('/courses/create',[CourseController::class,'create'])->name('courses.create');
Route::post('/courses',[CourseController::class,'store'])->name('courses.store');
Route::get('/courses/show/{id}',[CourseController::class,'show'])->name('courses.show');
Route::get('/courses/edit/{id}',[CourseController::class,'edit'])->name('courses.edit');
Route::put('/courses/edit/{id}',[CourseController::class,'update'])->name('courses.update');


//API
Route::get('/dog/random',[ApiController::class,'randomImage']);

Route::get('/cats',[ApiController::class,'catImage']);
Route::post('/cats/create', [ApiController::class, 'createCat']);
