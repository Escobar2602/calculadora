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

Route::get('/Simpson3/8', function () {
    return view('tSimpson3_8');
});

Route::get('/Simpson1/3', function () {
    return view('tSimpson1_3');
});

Route::get('/simpson-abierto', function () {
    return view('simpson_abierto');
});
