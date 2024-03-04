<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//新規会員登録
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

//user編集画面へ
Route::get('/users/{id}/edit', [EditController::class, 'editUserForm'])->name('edit_user_form');
Route::post('/users/{id}/update', [EditController::class, 'updateUser'])->name('update_user');

//user編集画面へ
Route::get('/home', [HomeController::class, 'index'])->name('home');
