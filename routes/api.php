<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CategoryController;

Route::middleware([])->group(function () {
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/category/{id}', [CategoryController::class, 'getData']);

    Route::get('/posts', [PostController::class, 'index']);
    Route::get('/post/{id}', [PostController::class, 'getData']);
    Route::post('/post/like-dislike/{post}', [PostController::class, 'likeDislike']);
    Route::post('/post/bookmark-unbookmark/{post}', [PostController::class, 'bookmarkUnbookmark']);
});
