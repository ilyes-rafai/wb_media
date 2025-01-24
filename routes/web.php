<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstructionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('users-edit-page-password/{user}', [UserController::class, 'edit_password'])->name("users.edit_password");
    Route::put('users-update-password/{user}', [UserController::class, 'update_password'])->name("users.update_password");
    Route::get('users-edit-page-avatar/{user}', [UserController::class, 'edit_avatar'])->name("users.edit_avatar");
    Route::put('users-update-avatar/{user}', [UserController::class, 'update_avatar'])->name("users.update_avatar");

    Route::resource('users', UserController::class)->except(['show']);

    Route::resource('topics', TopicController::class)->except(['show']);

    Route::resource('projects', ProjectController::class)->except(['show']);
    Route::get('projects-edit-instructions-page/{project}', [ProjectController::class, 'edit_instructions_page'])->name("projects.edit_instructions_page");

    Route::resource('instructions', InstructionController::class)->except(['show']);
    // Route::post('{project}/instructions-store', [InstructionController::class, 'store'])->name('instructions.store');


    Route::resource('posts', PostController::class)->except(['show']);
});


require __DIR__ . '/auth.php';
