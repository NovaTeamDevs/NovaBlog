<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\CategoryController;

Route::get('/', function () {
    return view('front.index');
})->name('home');

Route::get('/archive', function () {
    return view('front.archive');
})->name('archive');

Route::get('/category/{slug?}', function () {
    return view('front.category');
})->name('category');

Route::get('/search', function () {
    return view('front.search');
})->name('search');

Route::get('/author/{username}', function () {
    return view('front.author');
})->name('author');

Route::get('/contact-us', function () {
    return view('front.contact');
})->name('contact');

Route::get('/post/{slug}', function () {
    return view('front.post-detail');
})->name('post');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin.check'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');

    Route::prefix('category')->name('category.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/show/{category}', [CategoryController::class, 'show'])->name('show');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/update/{category}', [CategoryController::class, 'update'])->name('update');
        Route::delete('/destroy/{category}', [CategoryController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('post')->name('post.')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::get('/show/{post}', [PostController::class, 'show'])->name('show');
        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::post('/store', [PostController::class, 'store'])->name('store');
        Route::get('/edit/{post}', [PostController::class, 'edit'])->name('edit');
        Route::put('/update/{post}', [PostController::class, 'update'])->name('update');
        Route::delete('/destroy/{post}', [PostController::class, 'destroy'])->name('destroy');
        Route::post('/status/{post}', [PostController::class, 'status'])->name('status');
    });

    Route::prefix('comment')->name('comment.')->group(function () {
        Route::get('/', [CommentController::class, 'index'])->name('index');
        Route::get('/show/{comment}', [CommentController::class, 'show'])->name('show');
        Route::post('/answer/{comment}', [CommentController::class, 'answer'])->name('answer');
        Route::delete('/destroy/{comment}', [CommentController::class, 'destroy'])->name('destroy');
        Route::post('/status/{comment}', [CommentController::class, 'status'])->name('status');
    });

    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/show/{user}', [UserController::class, 'show'])->name('show');
        Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
        Route::put('/update/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('/destroy/{user}', [UserController::class, 'destroy'])->name('destroy');
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
