<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

Route::get('/',function(){
    return view('components.index');
});

Route::get('/login',[UserController::class,'showLogin',])->name('training.login');

Route::get('/sign-up',[UserController::class,'showSignUp'])->name('training.sign-up');

Route::post('/sign-up',[UserController::class,'signUp'])->name('training.sign-up.post');

Route::get('/admin', function () {
    return view('admin.dashboard');
});



Route::get('/send-test-email', function () {
    Mail::raw('Xin chao (Mail Test)', function ($message) {
        $message->to('lvkt0177@gmail.com')->subject('Mail Test');
    });

    return 'Email đã gửi!';
});