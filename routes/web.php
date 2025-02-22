<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

use App\Http\Controllers\UserAuthController;

Route::get('/',function(){
    return view('components.index');
})->name('training.home');

Route::get('/login',[UserAuthController::class,'showLogin',])->name('training.login');

Route::post('/login',[UserAuthController::class,'login'])->name('training.login.post');

Route::get('/logout',[UserAuthController::class,'logout']);

Route::get('/sign-up',[UserController::class,'showSignUp'])->name('training.sign-up');

Route::post('/sign-up',[UserController::class,'signUp'])->name('training.sign-up.post');

Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::middleware(['auth','user.status'])->group(function () {
    Route::get('/training/account',[UserController::class,'showAccount'])->name('training.account');
});

Route::get('/send-test-email', function () {
    Mail::raw('Xin chao (Mail Test)', function ($message) {
        $message->to('lvkt0177@gmail.com')->subject('Mail Test');
    });

    return 'Email đã gửi!';
});