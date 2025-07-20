<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

use App\Http\Controllers\Front\PostController as FrontPostController;
use App\Http\Controllers\Front\CategoryController as FrontCategoryController;
use App\Http\Controllers\Front\AuthorController as FrontAuthorController;
use App\Http\Controllers\Front\ContactController as FrontContactController;
use App\Http\Controllers\Front\CommentController as FrontCommentController;

//Post routes
Route::get('/', [FrontPostController::class, 'index'])->name('home');
Route::get('/archive', [FrontPostController::class, 'archive'])->name('archive');
Route::get('/search', [FrontPostController::class, 'search'])->name('search');
Route::get('/post/{slug}', [FrontPostController::class, 'postDetail'])->name('post');
//Comment routes
Route::post('/comment', [FrontCommentController::class, 'store'])->name('comment.store');
//Category route
Route::get('/category/{slug}', [FrontCategoryController::class, 'index'])->name('category');
//Author route
Route::get('/author/{username}', [FrontAuthorController::class, 'show'])->name('author');
//Contact
Route::get('/contact-us', [FrontContactController::class, 'index'])->name('contact.index');
Route::post('/contact-store', [FrontContactController::class, 'store'])->name('contact.store');

//Admin routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin.check'])->group(function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('dashboard');

    Route::prefix('category')->name('category.')->group(function () {
        Route::get('/', [AdminCategoryController::class, 'index'])->name('index');
        Route::get('/show/{category}', [AdminCategoryController::class, 'show'])->name('show');
        Route::get('/create', [AdminCategoryController::class, 'create'])->name('create');
        Route::post('/store', [AdminCategoryController::class, 'store'])->name('store');
        Route::get('/edit/{category}', [AdminCategoryController::class, 'edit'])->name('edit');
        Route::put('/update/{category}', [AdminCategoryController::class, 'update'])->name('update');
        Route::delete('/destroy/{category}', [AdminCategoryController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('post')->name('post.')->group(function () {
        Route::get('/', [AdminPostController::class, 'index'])->name('index');
        Route::get('/show/{post}', [AdminPostController::class, 'show'])->name('show');
        Route::get('/create', [AdminPostController::class, 'create'])->name('create');
        Route::post('/store', [AdminPostController::class, 'store'])->name('store');
        Route::get('/edit/{post}', [AdminPostController::class, 'edit'])->name('edit');
        Route::put('/update/{post}', [AdminPostController::class, 'update'])->name('update');
        Route::delete('/destroy/{post}', [AdminPostController::class, 'destroy'])->name('destroy');
        Route::post('/status/{post}', [AdminPostController::class, 'status'])->name('status');
    });

    Route::prefix('comment')->name('comment.')->group(function () {
        Route::get('/', [AdminCommentController::class, 'index'])->name('index');
        Route::get('/show/{comment}', [AdminCommentController::class, 'show'])->name('show');
        Route::post('/answer/{comment}', [AdminCommentController::class, 'answer'])->name('answer');
        Route::delete('/destroy/{comment}', [AdminCommentController::class, 'destroy'])->name('destroy');
        Route::post('/status/{comment}', [AdminCommentController::class, 'status'])->name('status');
    });

    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('index');
        Route::get('/create', [AdminUserController::class, 'create'])->name('create');
        Route::post('/store', [AdminUserController::class, 'store'])->name('store');
        Route::get('/show/{user}', [AdminUserController::class, 'show'])->name('show');
        Route::get('/edit/{user}', [AdminUserController::class, 'edit'])->name('edit');
        Route::put('/update/{user}', [AdminUserController::class, 'update'])->name('update');
        Route::delete('/destroy/{user}', [AdminUserController::class, 'destroy'])->name('destroy');
    });
});

require __DIR__ . '/auth.php';

Route::prefix('install')->name('install.')->group(function () {
    Route::get('/', function () {
        return view('install.index');
    })->name('index');

    Route::get('/migrate', function () {
        $exit_code = Artisan::call('migrate', ['--force' => true]);

        if ($exit_code == 0) {
            return response('Migrate done.');
        }

        return $exit_code;
    })->name('migrate');

    Route::get('/storage', function () {
        $exit_code = Artisan::call('storage:link', ['--force' => true]);

        if ($exit_code == 0) {
            return response('Storage link done.');
        }

        return $exit_code;
    })->name('storage');
});
