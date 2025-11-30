<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;

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
Route::post('/contacts', [ContactController::class, 'store']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::get('/confirm', [ContactController::class, 'confirmShow']);
Route::get('/thanks', function(){
    return view('thanks');
});

// 管理画面
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'admin']);
});
Route::get('/search', [AdminController::class, 'search']);
Route::get('/reset', [AdminController::class, 'admin']);
Route::get('/export', [AdminController::class, 'export']);
Route::delete('/delete', [AdminController::class, 'destroy']);


// ログアウト処理
Route::post('/logout', function () {
    Auth::logout();
    return view('login', ['pageType' => 'login']);
})->name('logout');