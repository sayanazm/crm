<?php

use Illuminate\Support\Facades\Route;

Route::get('/register', function () {
    return view('register');
});


Route::get('/login', function () {
    return view('login');
});

Route::get('/main', function () {
    return view('main');
});

Route::post('/register','UserController@register');
