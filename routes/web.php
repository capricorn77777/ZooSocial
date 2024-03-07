<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;

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
Route::get('/users/{id}/edit', [EditController::class, 'editUserForm'])->name('edit');
Route::put('/users/{id}/update', [EditController::class, 'updateUser'])->name('update_user');

//user編集画面へ
Route::get('/home', [HomeController::class, 'index'])->name('home');


// 投稿作成フォーム表示
Route::get('/posts/create', [PostController::class, 'showCreateForm'])->name('posts.create');

Route::post('/posts/store', [PostController::class, 'create'])->name('posts.store');


//logoutリンク
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//loginフォームのリンク
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

//loginメソッドへのポスト
Route::post('/login', [LoginController::class, 'login'])->name('login');


