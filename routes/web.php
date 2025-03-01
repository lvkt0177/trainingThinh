<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;

use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\PostsController;

use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\CheckLoginMiddleware;


// * User -----------------------------------------------------------------------------------------------------

Route::middleware(['auth:user', 'user.status'])->group(function () {
    //Profile
    Route::get('/profile', [UserController::class, 'showProfile'])->name('training.profile');

    //Edit PROFILE
    Route::get('/profile/edit',[UserController::Class,'showEditProfile'])->name('training.profile.edit');

    Route::post('/profile/edit',[UserController::class,'editProfile'])->name('training.profile.edit.post');

    //POSTS
    Route::get('/training/posts',[PostsController::class,'showPosts'])->name('training.posts');

    //Create POST
    Route::get('/training/posts/create',[PostsController::class,'showCreatePost'])->name('training.posts.create');

    //Create Fake Post (Factory)
    Route::post('/training/posts/fake',[PostsController::class,'createFakePost'])->name('training.posts.create.fake');
    //EDIT
    Route::get('/training/posts/{slug?}',[PostsController::class,'showEditPost']);

    Route::post('/training/posts/edit',[PostsController::class,'editPost'])->name('training.posts.edit.post');

     //Create
    Route::post('/training/posts/create',[PostsController::class,'createPost'])->name('training.posts.create.post');

    //Detail
    Route::get('/training/posts/detail/{slug?}',[PostsController::class,'details']);

    //Delete
    Route::delete('/training/posts/delete/{slug?}',[PostsController::class,'deletePost']);

    //Delete ALL
    Route::delete('/training/posts/deleteAll',[PostsController::class,'deleteAllPost'])->name('training.posts.deleteALL');

    //POSTS DELETED (TRASH)
    Route::get('/training/posts/profile/trash',[PostsController::class,'showTrash'])->name('training.posts.profile.trash');

    Route::post('/training/posts/profile/restore',[PostsController::class,'restorePost'])->name('training.posts.restore');
});

Route::get('/',function(){
    return view('components.index');
})->name('training.home');
 
Route::middleware(['user.check-login'])->group(function(){
    //LOGIN
    Route::get('/login',[UserAuthController::class,'showLogin',])->name('login');

    Route::post('/login',[UserAuthController::class,'login'])->name('training.login.post');

    //SIGN UP
    Route::get('/sign-up',[UserController::class,'showSignUp'])->name('training.sign-up');

    Route::post('/sign-up',[UserController::class,'signUp'])->name('training.sign-up.post');
});

//LOGOUT
Route::get('/logout',[UserAuthController::class,'logout'])->name('training.logout');

//FORGOT PASSWORD
Route::get('/forgot-password',[UserAuthController::class,'showForgotPassword'])->name('training.forgotPassword');

Route::post('/forgot-password',[UserAuthController::class,'UserResetPassword'])->name('training.forgotPassword.post');

//RESET PASSWORD
Route::get('/reset-password', [UserAuthController::class,'showResetPassword'])->name('training.resetPassword');

Route::post('/reset-password',[UserAuthController::class,'resetPassword'])->name('training.resetPassword.post');

Route::get('/admin', function () {
    return view('admin.dashboard');
});

//404
Route::get('/page-not-found',[Controller::class,'pageNotFound'])->name('training.404');

Route::get('/send-test-email', function () {
    Mail::raw('Xin chao (Mail Test)', function ($message) {
        $message->to('lvkt0177@gmail.com')->subject('Mail Test');
    });

    return 'Email đã gửi!';
});