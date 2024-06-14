<?php

use Illuminate\Support\Facades\Crypt;    
use Illuminate\Support\Facades\Route;
use App\Models\testt;
use Illuminate\Http\Request;
use App\Http\Controllers\UserPublicController;

use App\Http\Controllers\AssessmentController;

use App\Http\Controllers\AssessmentfController;
use App\Http\Controllers\TesttController;



route::get('testt/create', [TesttController::class, 'create'])->name('testt.create');
Route::post('testt/submit', [TesttController::class, 'store'])->name('testt.store');
Route::any('testt/show', [TesttController::class, 'show'])->name('testt.show');
Route::get('userpublic/create', [UserPublicController::class, 'create'])->name('userpublic.create');
Route::post('userpublic/store', [UserPublicController::class, 'store'])->name('userpublic.store');
Route::get('userpublic/show', [UserPublicController::class, 'show'])->name('userpublic.show');
Route::get('assessment/show', [AssessmentController::class, 'show'])->name('asssessment.show');




Route::get('/', function () {
    return view('welcome');
});


