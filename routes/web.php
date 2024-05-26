<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CommentController;
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
    return view('auth.login');
});

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/page', [CommentController::class, 'index'])->name('comments.index');
    Route::get('/page', [CommentController::class, 'index'])->name('comments.index');
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::patch('comments/{comment}/approve', [CommentController::class, 'approve'])->name('comments.approve');
    Route::patch('comments/{comment}/disapprove', [CommentController::class, 'disapprove'])->name('comments.disapprove');
    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');


    Route::resource('post', PostController::class);

    
    // Route::get('/post', [PostController::class, 'index'])->name('post.index');
    // Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    // Route::post('/post/create', [PostController::class, 'store'])->name('post.store');
    // Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
    // Route::put('/post/{post}', [PostController::class, 'update'])->name('post.update');
    // Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');
    // Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');

});

require __DIR__.'/auth.php';
