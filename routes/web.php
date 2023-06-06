<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AppController::class, 'Home'])->name('Home');

Route::get('/list-categories', [CategoryController::class, 'allCategories'])->name('allCategories');

Route::get('/create-category', [CategoryController::class, 'createCategoryPage'])->name('createCategoryPage');

Route::post('/create-category', [CategoryController::class, 'createCategory'])->name('createCategory');

Route::get('/categories/{category}', [CategoryController::class, 'updateCategoryPage'])->name('updateCategoryPage');

Route::put('/categories/{category}', [CategoryController::class, 'updateCategory'])->name('updateCategory');

Route::delete('/categories/{category}', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');


Route::resource('posts', PostController::class);
Route::get('posts/{post_id}/details', [PostController::class, 'details'])->name('details');
