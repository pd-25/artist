<?php

use App\Http\Controllers\Admin\Artist\ArtistController;
use App\Http\Controllers\Admin\Artworks\ArtworkController;
use App\Http\Controllers\Admin\Banner\BannerController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\artist\ArtworkController as ArtistArtworkController;
use App\Http\Controllers\artist\AuthController;
use App\Http\Controllers\artist\DashboardController as ArtistDashboardController;
use App\Http\Controllers\Auth\LoginController;
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
    return view('userLogin');
})->name('artistLogin');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
     
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::resource('artists', ArtistController::class);
Route::resource('artworks', ArtworkController::class);

Route::delete('/delete-comment/{id}', [ArtworkController::class, 'deleteComment'])->name('comment.delete');

Route::resource('banners', BannerController::class);

});
Route::get('/all-comment', [ArtworkController::class, 'allComment'])->name('admin.allComment');

Route::post('userlogin', [AuthController::class, 'userlogin'])->name('userlogin');
Route::group(['prefix' => 'user', 'middleware' => 'artistCheck'], function () {
    Route::get('/artist-dashboard', [ArtistDashboardController::class, 'index'])->name('artists.dashboard');
    Route::get('/artist-profile', [ArtistDashboardController::class, 'profile'])->name('artists.profile');
    Route::put('/artist-profile/{id}', [ArtistController::class, 'update'])->name('artists.profileUpdate');

    Route::get('/artwork-get', [ArtistArtworkController::class, 'getArtistWiseArtwork'])->name('artists.getArtistWiseArtwork');
    Route::get('/artwork-upload', [ArtistArtworkController::class, 'getForm'])->name('artists.getForm');
    Route::post('/artwork-upload', [ArtistArtworkController::class, 'uploadArtistWiseArtwork'])->name('artists.uploadArtistWiseArtwork');
    Route::get('/artwork-edit/{id}', [ArtistArtworkController::class, 'editArtwork'])->name('artist.editArtwork');
    Route::put('/artwork-edit/{id}', [ArtistArtworkController::class, 'updateArtwork'])->name('artist.updateArtwork');
    Route::delete('/artwork-delete/{id}', [ArtistArtworkController::class, 'destroyArtwork'])->name('artist.destroyArtwork');
    

});
