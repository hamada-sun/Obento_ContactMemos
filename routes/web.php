<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 260306テストデザイン環境を表示するための設定を追加
Route::view('/design/test','design.test');

// 260306_/resources/views/designファイル内のリンクを、HTML風に有効化
Route::get('/design/{name}', function ($name) {
    return view("design.$name"); //この場合""(ﾀﾞﾌﾞﾙｸｫｰﾄ)じゃないと正しく見つけてくれない
});

require __DIR__.'/auth.php';
