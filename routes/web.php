<?php

use App\Http\Controllers\Front\LoginController;
use App\Http\Controllers\Front\RegisterController;
use App\Http\Controllers\Front\ResumeController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'index')->name('home');

Route::view('/login', 'front.auth.login')->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::view('/register', 'front.auth.register')->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

Route::middleware('auth')->group(function () {

    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    // Resumes
    
    Route::prefix('resumes')->as('resumes.')->group(function() {
        Route::get('/show', [ResumeController::class, 'show'])->name('show');
        Route::get('/pdf',  [ResumeController::class, 'pdf'])->name('pdf');

        Route::prefix('create')->as('create.')->group(function() {
            Route::get('template',     [ResumeController::class, 'template'])->name('template');
            Route::view('contact',      'front.resumes.create.contact')->name('contact');
            Route::view('experience',   'front.resumes.create.experience')->name('experience');
            Route::view('education',    'front.resumes.create.education')->name('education');
            Route::view('skill',        'front.resumes.create.skill')->name('skill');
            Route::view('language',     'front.resumes.create.language')->name('language');
            Route::view('description',  'front.resumes.create.description')->name('description');
        });
        
        Route::post('/template',    [ResumeController::class, 'handleTemplate'])->name('template');
        Route::post('/contact',     [ResumeController::class, 'handleContact'])->name('contact');
        Route::post('/experience',  [ResumeController::class, 'handleExperience'])->name('experience');
        Route::post('/education',   [ResumeController::class, 'handleEducation'])->name('education');
        Route::post('/skill',       [ResumeController::class, 'handleSkill'])->name('skill');
        Route::post('/language',    [ResumeController::class, 'handleLanguage'])->name('language');
        Route::post('/description', [ResumeController::class, 'handleDescription'])->name('description');

    });
    

});
