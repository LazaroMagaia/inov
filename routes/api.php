<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{VideosController};
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/client/video/watched/{id}/{user_id}', [VideosController::class, 'video_watched_api'])
->name('client.video.watched');
Route::post('/client/video/progress/{id}/{user_id}/{progress}', [VideosController::class, 'video_progress_api'])
->name('client.video.progress');