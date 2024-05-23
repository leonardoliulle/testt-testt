<?php

use Illuminate\Support\Facades\Crypt;    
use Illuminate\Support\Facades\Route;
use App\Models\testt;
use Illuminate\Http\Request;
use App\Http\Controllers\UserPublicController;
<<<<<<< HEAD
use App\Http\Controllers\AssessmentController;
=======
use App\Http\Controllers\AssessmentfController;
use App\Http\Controllers\TesttController;
>>>>>>> 0da956e (New push)



route::get('testt/create', [TesttController::class, 'create'])->name('testt.create');
Route::post('testt/submit', [TesttController::class, 'store'])->name('testt.store');
Route::any('testt/show', [TesttController::class, 'show'])->name('testt.show');


Route::get('userpublic/create', [UserPublicController::class, 'create'])->name('userpublic.create');
Route::post('userpublic/store', [UserPublicController::class, 'store'])->name('userpublic.store');
Route::get('userpublic/show', [UserPublicController::class, 'show'])->name('userpublic.show');
<<<<<<< HEAD
Route::get('assessment/show', [AssessmentController::class, 'show'])->name('asssessment.show');
=======
Route::get('assessment/show', [AssessmentfController::class, 'show'])->name('asssessment.show');
Route::get('assessment/showme', [AssessmentfController::class, 'showme'])->name('asssessment.showme');

Route::get('userpublic/counter', [UserPublicController::class, 'counter'])->name('userpublic.counter');

// Route::get('/assessment', \App\Http\Livewire\Assessmentf::class);

>>>>>>> 0da956e (New push)

Route::get('/', function () {
    return view('welcome');
});


