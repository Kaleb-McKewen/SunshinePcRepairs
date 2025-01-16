<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\CommentController;
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
    Route::get('/blog/manage', [PostController::class, 'viewAll']);
});
//auth
Route::middleware('auth')->group(function(){
    Route::delete('logout', [SessionController::class, 'destroy']);
    //comments
    Route::get('/blog/comment/new/{post}', [CommentController::class,'create'])->name('newComment');
    Route::post('/blog/comment/new/{post}', [CommentController::class,'store'])->name('newCommentSubmit');
    Route::delete('/blog/comment/{comment}/delete', [CommentController::class,'destroy'])->name('deleteComment');
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



//managing
Route::middleware(['auth', EnsureUserIsAdmin::class])->group(function(){
    Route::get('/blog/edit/{post}', [PostController::class, 'editShow']);
    Route::post('/blog/edit/{post}', [PostController::class, 'edit']);
    Route::delete('/blog/delete/{post}', [PostController::class, 'destroy']);
    Route::view('/dashboard','components.manage.dashboard')->name('dashboard');
    Route::get('/dashboard/admin', [RegisteredUserController::class,'createAdmin']);
    Route::post('/dashboard/admin/{user}', [RegisteredUserController::class,'storeAdmin']);
    Route::get('/dashboard/profile', [RegisteredUserController::class, 'viewAdmin']);
    Route::Post('/dashboard/profile', [RegisteredUserController::class, 'updateAdmin']);
});
