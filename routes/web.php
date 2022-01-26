<?php

use App\Http\Controllers\{
    DashboardContoller,
    ShuffleController,
    VoteController
 };
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'] , function () {
    Route::get('/dashboard', [DashboardContoller::class, 'index'])->name('dashboard');

    Route::resource('vote', VoteController::class);
    Route::resource('shuffle', ShuffleController::class);
});

require __DIR__.'/auth.php';
