<?php

use App\Http\Controllers\API\{
    NotificationController, ParticipantController, ParticipantShuffleController, ShuffleController
};
use Illuminate\Support\Facades\Route;

Route::apiResource('shuffles', ShuffleController::class)->only(['index', 'show']);

Route::get('participant/shuffle/joinedStatus/{participant}/{shuffle}', [ParticipantShuffleController::class, 'joinedStatus']);
Route::get('participant/shuffle/{participant}/{shuffle}', [ParticipantShuffleController::class, 'show']);

Route::group(['middleware' => 'participant.shuffle'], function () {
    Route::post('participant/shuffle', [ParticipantShuffleController::class, 'store']);
});

Route::group(['middleware' => 'block.ip.address'], function () {
    Route::post('participant', [ParticipantController::class, 'store']);
});
Route::get('participant/checkRegistered/{wallet_address}', [ParticipantController::class, 'checkRegistered']);
// Route::get('participant/{participant}', [ParticipantController::class, 'show']);

Route::get('notification', [NotificationController::class, 'index']);


