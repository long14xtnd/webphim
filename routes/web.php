<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\WatchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\LongController;
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
Route::get('/danh-muc/{slug}', [IndexController::class, 'category'])->name('category');
Route::get('/quoc-gia/{slug}', [IndexController::class, 'country'])->name('country');

Route::get('/the-loai/{slug}', [IndexController::class, 'genre'])->name('genre');
Route::get('/xem-phim', [IndexController::class, 'watch'])->name('watch');
Route::get('/phim/{slug}', [IndexController::class, 'movie'])->name('movie');
Route::get('/episode', [IndexController::class, 'episode'])->name('episode');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


//route administration
Route::resource('/category', CategoryController::class);
Route::resource('/country', CountryController::class);
Route::resource('/movie', MovieController::class);
Route::resource('/watch', WatchController::class);
Route::resource('/genre', GenreController::class);
Route::resource('/episode', EpisodeController::class);

Route::post('resorting',[CategoryController::class,'resorting_category'])->name('resorting_category');

Route::get('/hailongdev', [LongController::class, 'hailongdev']);
