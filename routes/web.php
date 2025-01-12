<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\SessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;

//basic routes
Route::get('/', function () {
    return view('index');
})->name('index');
Route::view('/contact','contact')->name('contact');

//blog
Route::get('/blog', [PostController::class, 'index'])->name('blog');
Route::get('/blog/{post}', [PostController::class, 'show']);
Route::get('/blog/tag/{tag:name}', [TagController::class, 'show']);
Route::get('/blog/user/{user}', [PostController::class, 'userPosts']);

//auth guest
Route::middleware('guest')->group(function() {
    Route::get('register', [RegisteredUserController::class, 'create']);
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [SessionController::class, 'create']);
    Route::post('login', [SessionController::class, 'store']);
});

//auth
Route::middleware('auth')->group(function(){
    Route::delete('logout', [SessionController::class, 'destroy']);
});