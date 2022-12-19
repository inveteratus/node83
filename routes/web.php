<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\PastebinController;
use App\Http\Controllers\SnippetController;
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

Route::prefix('')->group(__DIR__ . '/auth.php');

Route::prefix('pastebin')->group(function () {
    Route::get('', [PastebinController::class, 'create'])->name('pastebin');
    Route::post('', [PastebinController::class, 'store']);
    Route::get('{hash}', [PastebinController::class, 'show'])->name('pastebin.show');
});

Route::prefix('image')->group(function () {
    Route::get('', [ImageController::class, 'create'])->name('imagebin');
    Route::post('', [ImageController::class, 'store']);
    Route::get('{hash}', [ImageController::class, 'show'])->name('imagebin.show');
});

Route::prefix('snippet')->group(function () {
    Route::get('', [SnippetController::class, 'index'])->name('snippet.index');
    Route::get('add', [SnippetController::class, 'create'])->name('snippet.create');
    Route::post('add', [SnippetController::class, 'store']);
    Route::get('{snippet}', [SnippetController::class, 'show'])->name('snippet.show');
});

Route::view('', 'index')->name('index');
