<?php

use App\Http\Controllers\Api\artist\ArtistController;
use App\Http\Controllers\Api\artwork\ArtworkController;
use App\Http\Controllers\Api\auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login', [AuthController::class, 'loginUser']);
Route::post('/register', [AuthController::class, 'register']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/artist', [ArtistController::class, 'artistInfo']);
    Route::post('/artist-update/{id}', [ArtistController::class, 'artistUpdate']);
    Route::post('/upload-artwork', [ArtworkController::class, 'artworkUpload']);
    Route::post('/upload-banner', [ArtworkController::class, 'artworkBanner']);


});
Route::get('/subjects', [ArtistController::class, 'subjects']);
Route::get('/placements', [ArtistController::class, 'placements']);
Route::get('/styles', [ArtistController::class, 'styles']);

Route::get('/all-artworks', [ArtworkController::class, 'allArtwork'])->name('allArtwork');
