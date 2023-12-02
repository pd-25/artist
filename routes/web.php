<?php

use App\Http\Controllers\Admin\Artist\ArtistController;
use App\Http\Controllers\Admin\Artworks\ArtworkController;
use App\Http\Controllers\Admin\Banner\BannerController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
     
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::resource('artists', ArtistController::class);
Route::resource('artworks', ArtworkController::class);
Route::get('/all-comment', [ArtworkController::class, 'allComment'])->name('admin.allComment');
Route::delete('/delete-comment/{id}', [ArtworkController::class, 'deleteComment'])->name('comment.delete');

Route::resource('banners', BannerController::class);

});
