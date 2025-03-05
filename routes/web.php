<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;

use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminController;

use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\CheckLoginMiddleware;
use App\Http\Middleware\AdminMiddleware;

// * User -----------------------------------------------------------------------------------------------------
Route::get('/',function(){
    return view('components.index');
})->name('training.home');

Route::get('/news',[NewsController::class,'showNews'])->name('training.news');

//Detail
Route::get('/training/posts/detail/{slug?}',[PostsController::class,'details']);

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

    //Delete
    Route::delete('/training/posts/delete/{slug?}',[PostsController::class,'deletePost']);

    //Delete ALL
    Route::delete('/training/posts/deleteAll',[PostsController::class,'deleteAllPost'])->name('training.posts.deleteALL');

    //POSTS DELETED (TRASH)
    Route::get('/training/posts/profile/trash',[PostsController::class,'showTrash'])->name('training.posts.profile.trash');

    Route::post('/training/posts/profile/restore',[PostsController::class,'restorePost'])->name('training.posts.restore');

    //Restore ALL
    Route::post('/training/posts/profile/restoreAll',[PostsController::class,'restoreAllPost'])->name('training.posts.restoreAll');
});


 
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

Route::post('/logout',[UserAuthController::class,'logout'])->name('training.logout.post');

//FORGOT PASSWORD
Route::get('/forgot-password',[UserAuthController::class,'showForgotPassword'])->name('training.forgotPassword');

Route::post('/forgot-password',[UserAuthController::class,'UserResetPassword'])->name('training.forgotPassword.post');

//RESET PASSWORD
Route::get('/reset-password', [UserAuthController::class,'showResetPassword'])->name('training.resetPassword');

Route::post('/reset-password',[UserAuthController::class,'resetPassword'])->name('training.resetPassword.post');

//404
Route::get('/page-not-found',function (){
    return view('error.pageerror');
})->name('training.404');

Route::get('/send-test-email', function () {
    Mail::raw('Xin chao (Mail Test)', function ($message) {
        $message->to('lvkt0177@gmail.com')->subject('Mail Test');
    });

    return 'Email đã gửi!';
});

// * Admin -----------------------------------------------------------------------------------------------------
Route::get('/admin/login',[AdminController::class,'showLogin'])->name('admin.login');

Route::post('/admin/login',[AdminController::class,'login'])->name('admin.login.post');

Route::middleware(['admin.check-login'])->group(function(){
    Route::get('/admin', [AdminController::class,'showDashboard'])->name('admin.dashboard');

    //admin posts
    Route::get('/admin/posts',[AdminController::class,'showPosts'])->name('admin.posts');

    //admin users
    Route::get('/admin/users',[AdminController::class,'showUsers'])->name('admin.users');
    //--------------------------------------------------------------------------------------------------------------
    //Posts
    //Search post
    Route::get('/admin/posts/search',[AdminController::class,'searchPost'])->name('admin.posts.search');

    //Edit Post
    Route::get('/admin/posts/edits/{slug?}',[AdminController::class,'showEditPost']);

    Route::post('/admin/posts/edits',[AdminController::class,'editPost'])->name('admin.posts.edit.post');

    //--------------------------------------------------------------------------------------------------------------
    //User 
    Route::get('/admin/users/edit/{id?}',[AdminController::class,'showEditUser']);

    Route::post('/admin/users/edit',[AdminController::class,'editUser'])->name('admin.users.edit.post');

    //Search user
    Route::post('/admin/users/search',[AdminController::class,'searchUser'])->name('admin.users.search');
});

