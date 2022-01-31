<?php

use App\Http\Controllers\{
    DashboardContoller,
    NotificationController,
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

    Route::get('shuffle-export-winners/{shuffle}', [ShuffleController::class, 'exportWinners'])->name('shuffle.export_winners');
    Route::resource('shuffle', ShuffleController::class);
    Route::resource('notification', NotificationController::class);
});

require __DIR__.'/auth.php';
