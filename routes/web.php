<?php

use Illuminate\Support\Facades\Route;


Route::get('testt/create', function () { echo view('testt/create'); });


Route::get('/', function () {
    return view('welcome');
});


Route::get('/testtt', function () { echo "Echo from Liulle Testtt"; });

Route::get('/', function () {
    return view('welcome');
});


