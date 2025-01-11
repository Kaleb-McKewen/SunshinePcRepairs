<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/blog', [PostController::class, 'index'])->name('blog');
Route::get('/blog/{post}', [PostController::class, 'show']);

Route::view('/contact','contact')->name('contact');

Route::get('/blog/tag/{tag:name}', [TagController::class, 'show']);
Route::get('/blog/user/{user}', [PostController::class, 'userPosts']);