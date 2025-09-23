<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgentController;

Route::get('/agents', [AgentController::class, 'index'])->name('agents.index');




Route::get('/', function () {
    return view('welcome');
});

// Route::group(['middleware' => ['guest']], function () {
    Route::get('/register', [AuthController::class, 'registerPage'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
// });


Route::group(['middleware' => ['auth']], function () {

    Route::get('/admins', function () {
        return view('layout.admin');
    })->name('admin');


    //User Routes
    Route::get('/user', [UserController::class, 'index'])->name("user");
    Route::get('/User/{user}/edit_user', [UserController::class, 'edit'])->name('edit.user');
    Route::put('/User/{user}', [UserController::class, "update"])->name("user.update");
    Route::get('/user/{user}/user_view', [UserController::class, 'show'])->name("user.view");
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/user/search', [UserController::class, 'search'])->name('user.search');

    //UserRole Routes
    Route::get("/user_role", [RoleController::class, 'index'])->name('user_role');
    Route::get('/user/{user}/edit-role', [RoleController::class, 'edit'])->name('edit.role');
    Route::put('/user/{user}', [RoleController::class, 'update'])->name('update.role');


    //Skills routes
    Route::get('/skills', [SkillController::class, 'index'])->name('skills');
    Route::get('/skills/create', [SkillController::class, 'create_form'])->name('skills.create');
    Route::post('/skills/create', [SkillController::class, 'store']);

    //Experience Routes
    Route::get('/experience', function () {
        return view('experience');
    });

    //Project routes
    Route::get('/projects', function () {
        return view('projects');
    });

    //Experience Routes
    Route::get('/experience', [ExperienceController::class, 'index'])->name('experience');
    Route::get('/experience/create', [ExperienceController::class, 'create_form'])->name('experience.create');
    Route::post('/experience/create', [ExperienceController::class, 'store']);

    //Project routes
    Route::get('/projects', [ProjectController::class, 'index'])->name('project');
    Route::get('/projects/create', [ProjectController::class, 'create_form'])->name('projects.create');
    Route::post('/projects/create', [ProjectController::class, 'create']);

    //Students routes
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');

    //Author routes
    Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
    Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create');
    Route::post('/authors', [AuthorController::class, 'store'])->name('authors.store');

    Route::get('/user_post', [PostController::class, 'withPosts'])->name('user_post');
    Route::get('/post_create', [PostController::class, 'index']);
    Route::post('/post_create', [PostController::class, 'store'])->name("posts.store");

    Route::get('/admin', function () {
        return view('layout.admin');
    });
});
