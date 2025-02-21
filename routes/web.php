<?php

use Illuminate\Support\Facades\Route;


Route::get('/',function(){
    return view('components.index');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
});



Route::get('/send-test-email', function () {
    Mail::raw('Xin chao (Mail Test)', function ($message) {
        $message->to('lvkt0177@gmail.com')->subject('Mail Test');
    });

    return 'Email đã gửi!';
});