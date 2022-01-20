<?php

use App\Http\Controllers\DashboardContoller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoteController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'] , function () {
    Route::get('/dashboard', [DashboardContoller::class, 'index'])->name('dashboard');

    Route::resource('vote', VoteController::class);
});

require __DIR__.'/auth.php';
