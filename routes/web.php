<?php

use App\Http\Controllers\ChapterController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TrickController;
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
})->name('welcome');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // user routes
    Route::get('users-edit-page-password/{user}', [UserController::class, 'edit_password'])->name("users.edit_password");
    Route::put('users-update-password/{user}', [UserController::class, 'update_password'])->name("users.update_password");
    Route::get('users-edit-page-avatar/{user}', [UserController::class, 'edit_avatar'])->name("users.edit_avatar");
    Route::put('users-update-avatar/{user}', [UserController::class, 'update_avatar'])->name("users.update_avatar");
    Route::resource('users', UserController::class)->except(['show']);


    // topic routes
    Route::resource('topics', TopicController::class)->except(['show']);
    Route::get('topics-edit-page-svg/{topic}', [TopicController::class, 'edit_svg'])->name("topics.edit_svg");
    Route::put('topics-update-svg/{topic}', [TopicController::class, 'update_svg'])->name("topics.update_svg");


    // trick routes
    Route::resource('tricks', TrickController::class)->except(['show']);
    Route::get('tricks-edit-instructions-page/{trick}', [TrickController::class, 'edit_instructions_page'])->name("tricks.edit_instructions_page");
    Route::put('edit-trick-premium/{trick}', [TrickController::class, 'handleTrickPremium'])->name('handleTrickPremium');
    Route::get('tricks-list', [DashboardController::class, 'trickList'])->name("trickList");
    Route::get('trick-show/{trick}', [DashboardController::class, 'trickShow'])->name("trickShow");


    // exercice routes
    Route::get('exercices-list', [DashboardController::class, 'exerciceList'])->name("exerciceList");


    // vocabulary routes
    Route::get('vocabularys-list', [DashboardController::class, 'vocabularyList'])->name("vocabularyList");


    // quiz routes
    Route::get('quizs-list', [DashboardController::class, 'quizList'])->name("quizList");


    // instruction routes
    Route::resource('instructions', InstructionController::class)->except(['show']);
    Route::put('edit-instruction-premium/{instruction}', [InstructionController::class, 'handleInstructionPremium'])->name('handleInstructionPremium');


    // course routes
    Route::resource('courses', CourseController::class)->except(['show']);
    Route::get('courses-edit-chapters-page/{course}', [CourseController::class, 'edit_chapters_page'])->name("courses.edit_chapters_page");
    Route::put('edit-course-premium/{course}', [CourseController::class, 'handleCoursePremium'])->name('handleCoursePremium');
    Route::get('courses-list', [DashboardController::class, 'courseList'])->name("courseList");
    Route::get('course-show/{course}', [DashboardController::class, 'courseShow'])->name("courseShow");


    // chapter routes
    Route::resource('chapters', ChapterController::class)->except(['show']);
    Route::put('edit-chapter-premium/{chapter}', [ChapterController::class, 'handleChapterPremium'])->name('handleChapterPremium');


    // post routes
    Route::resource('posts', PostController::class)->except(['show']);
});


require __DIR__ . '/auth.php';
