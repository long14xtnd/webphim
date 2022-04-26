<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [IndexController::class, 'home'])->name('homepage');
Route::get('/', [IndexController::class, 'category'])->name('category');
Route::get('/', [IndexController::class, 'genre'])->name('genre');
Route::get('/', [IndexController::class, 'movie'])->name('movie');
Route::get('/', [IndexController::class, 'watch'])->name('watch');
Route::get('/', [IndexController::class, 'episode'])->name('episode');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
