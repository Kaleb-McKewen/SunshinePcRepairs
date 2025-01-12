<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\SessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Middleware\EnsureUserIsAdmin;

//basic routes
Route::get('/', function () {
    return view('index');
})->name('index');
Route::view('/contact','contact')->name('contact');

//blog
Route::get('/blog', [PostController::class, 'index'])->name('blog');
//auth admin
Route::middleware(['auth', EnsureUserIsAdmin::class])->group(function(){
    Route::get('/blog/new', [PostController::class, 'create']);
    Route::post('/blog/new', [PostController::class, 'store']);
});
Route::get('/blog/{post}', [PostController::class, 'show']);
Route::get('/blog/tag/{tag:name}', [TagController::class, 'show']);
Route::get('/blog/user/{user}', [PostController::class, 'userPosts']);

//auth guest
Route::middleware('guest')->group(function() {
    Route::get('register', [RegisteredUserController::class, 'create']);
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [SessionController::class, 'create'])->name('login');
    Route::post('login', [SessionController::class, 'store']);
});

//auth
Route::middleware('auth')->group(function(){
    Route::delete('logout', [SessionController::class, 'destroy']);
});

