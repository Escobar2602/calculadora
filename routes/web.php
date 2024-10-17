<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/trapezoidal', function () {
    return view('trapezoidal');
});

Route::get('/jorgeboole', function () {
    return view('jorgeboole');
});
