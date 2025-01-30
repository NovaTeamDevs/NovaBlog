<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\CategoryController;

Route::prefix('auth')->middleware(['api', 'guest'])->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/reset-password', [AuthController::class, 'resetPassword']);
});

Route::middleware(['auth:sanctum', 'ability:read'])->group(function () {
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/category/{id}', [CategoryController::class, 'getData']);

    Route::get('/posts', [PostController::class, 'index']);
    Route::get('/post/{id}', [PostController::class, 'getData']);
    Route::post('/post/like-dislike/{post}', [PostController::class, 'likeDislike']);
    Route::post('/post/bookmark-unbookmark/{post}', [PostController::class, 'bookmarkUnbookmark']);

    Route::get('/comments/get/{post_id}', [CommentController::class, 'index']);
    Route::post('/comments/store/{post_id}', [CommentController::class, 'store']);

    Route::get('/user/profile', [UserController::class, 'getUserData']);
    Route::post('/user/update-profile', [UserController::class, 'updateProfile']);
    Route::post('/user/update-avatar', [UserController::class, 'updateAvatar']);
    Route::post('/user/update-password', [UserController::class, 'updatePassword']);

    //Special access
    Route::middleware(['abilities:read,write'])->group(function () {
        Route::post('/category/store', [CategoryController::class, 'store']);
        Route::post('/category/update/{id}', [CategoryController::class, 'update']);
        Route::delete('/category/destroy/{id}', [CategoryController::class, 'destroy']);

        Route::post('/post/store', [PostController::class, 'store']);
        Route::post('/post/update/{id}', [PostController::class, 'update']);
        Route::delete('/post/destroy/{id}', [PostController::class, 'destroy']);

        Route::get('/comments/all-comments', [CommentController::class, 'allComments']);
        Route::post('/comments/change-status/{comment_id}', [CommentController::class, 'changeStatus']);
        Route::delete('/comments/destroy/{comment_id}', [CommentController::class, 'destroy']);

        Route::get('/user/get-all', [UserController::class, 'getUsers']);
        Route::post('/user/store', [UserController::class, 'store']);
        Route::post('/user/update/{user_id}', [UserController::class, 'update']);
        Route::delete('/user/destroy/{user_id}', [UserController::class, 'destroy']);
    });
});
