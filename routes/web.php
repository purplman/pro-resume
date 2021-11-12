<?php

use App\Http\Controllers\Front\LoginController;
use App\Http\Controllers\Front\RegisterController;
use App\Http\Controllers\ResumeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'index')->name('home');

Route::view('/login', 'front.auth.login')->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::view('/register', 'front.auth.register')->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

Route::middleware('auth')->group(function () {

    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    // Resumes
    Route::resource('resumes', ResumeController::class);
    Route::get('/resumes/create/contact', [ResumeController::class, 'contact']);

});
