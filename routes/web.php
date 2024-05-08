<?php

use Illuminate\Support\Facades\Route;
use App\Models\testt;
use Illuminate\Http\Request;
use App\Http\Controllers\TesttController;



Route::resource('/testt', TesttController::class);

// Route::get('testt/create', function () { echo view('testt/create'); });
// Route::post('/testt-save-data', function () { 
//     echo 'TEst';
//  });


Route::get('/testtt', function () {
    return view('welcome');
});


Route::get('/testtt', function () { echo "Echo from Liulle Testtt"; });

Route::get('/', function () {
    return view('welcome');
});


