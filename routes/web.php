<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
// home page
// Route::middleware('guest')->group(function () {
// Route::get('/', function () {
//     return view('index');
// })->name('home');
// // ))

Route::get('/', [HomeController::class, 'index'])->name('home');
// Category  Admin Routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('categories', CategoryController::class);
});
//category Author read only 
Route::middleware(['auth'])->group(function () {
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
});
// Post Admin Routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('posts', PostController::class);
});
// Post Author  Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/my-posts', [PostController::class, 'myPosts'])->name('posts.my');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});


Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// WYSIWIG
Route::post('/posts/upload-image', [PostController::class, 'uploadImage'])->name('posts.upload-image');
Route::get('/search', [PostController::class, 'search'])->name('posts.search');
