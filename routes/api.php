<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

route::get('/user/save-or-update', function(string $myvalue, int $mynumber) {
    return true;
});

