<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;

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

// お問い合わせフォーム
Route::get('/', [ContactController::class, 'index']);
Route::post('/contacts/confirm', [ContactController::class, 'confirm']);
Route::post('/contacts', [ContactController::class, 'store']);
Route::get('/thanks', function(){
    return view('thanks');
});

// 管理画面

// ユーザ登録
Route::get('/register', function(){
    return view('register');
});
Route::post('/register', [UserController::class, 'register']);
Route::get('/login', function(){
    return view('login');
});
Route::post('/login', [UserController::class, 'login']);

Route::get('/admin', [UserController::class, 'admin']);

