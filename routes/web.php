<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\DashboardController;


Route::get('/admin', [DashboardController::class, 'index'])->middleware('auth')->name('home');

Route::get('/', function () {
    return view('home');
});

// begin blog routes
Route::get('/blogs', [PostsController::class,'index'])->name('posts');

Route::get('/category/{slug}', [PostsController::class,'show'])->name('posts.slug');

Route::get('/{category}', [PostsController::class,'category'])->name('posts.category');
// end blog routes
