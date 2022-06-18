<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;

Route::middleware('auth')->group(function() {
// begin auth group

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::prefix('blog')->name('blog.')->group(function(){

  Route::get('/', [BlogController::class,'index'])->name('index');
  Route::get('/add', [BlogController::class,'add'])->name('add');
  Route::post('/add', [BlogController::class,'store'])->name('store');
  Route::get('/edit/{blog}', [BlogController::class,'edit'])->name('edit');
  Route::post('/edit/{blog}', [BlogController::class,'update'])->name('update');
  Route::get('/delete/{id}', [BlogController::class,'delete'])->name('delete');
  Route::get('/publish/{id}', [BlogController::class,'publish'])->name('publish');
});

Route::get('/chart', function(){
  return view('backoffice.dashboard.chart');
});
Route::get('/categories', [CategoryController::class,'index'])->name('categories');
Route::get('/drafts', [BlogController::class,'drafts'])->name('drafts');
Route::get('/draft/edit/{blog}', [BlogController::class,'edit'])->name('draft.edit');
Route::post('/draft/edit/{blog}', [BlogController::class,'update'])->name('draft.update');

});
// end auth group

Auth::routes([
  // 'register' => false, 
  // 'reset' => false, 
  // 'verify' => false, 
]);
