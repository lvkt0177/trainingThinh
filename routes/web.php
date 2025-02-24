<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;

use App\Http\Controllers\UserAuthController;

Route::middleware(['auth:user', 'user.status'])->group(function () {
    //Profile
    Route::get('/profile', [UserController::class, 'showProfile'])->name('training.profile');

    //Edit PROFILE
    Route::get('/profile/edit',[UserController::Class,'showEditProfile'])->name('training.profile.edit');

    Route::post('/profile/edit',[UserController::class,'editProfile'])->name('training.profile.edit.post');

});


Route::get('/',function(){
    return view('components.index');
})->name('training.home');

//LOGIN
Route::get('/login',[UserAuthController::class,'showLogin',])->name('login');

Route::post('/login',[UserAuthController::class,'login'])->name('training.login.post');

//LOGOUT
Route::get('/logout',[UserAuthController::class,'logout'])->name('training.logout');

//SIGN UP
Route::get('/sign-up',[UserController::class,'showSignUp'])->name('training.sign-up');

Route::post('/sign-up',[UserController::class,'signUp'])->name('training.sign-up.post');

//FORGOT PASSWORD
Route::get('/forgot-password',[UserAuthController::class,'showForgotPassword'])->name('training.forgotPassword');

Route::post('/forgot-password',[UserAuthController::class,'UserResetPassword'])->name('training.forgotPassword.post');

//RESET PASSWORD
Route::get('/reset-password', [UserAuthController::class,'showResetPassword'])->name('training.resetPassword');

Route::post('/reset-password',[UserAuthController::class,'resetPassword'])->name('training.resetPassword.post');

Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::get('/send-test-email', function () {
    Mail::raw('Xin chao (Mail Test)', function ($message) {
        $message->to('lvkt0177@gmail.com')->subject('Mail Test');
    });

    return 'Email đã gửi!';
});