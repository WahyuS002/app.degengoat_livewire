<?php

use App\Http\Controllers\API\NotificationController;
use App\Http\Controllers\API\ShuffleController;
use App\Http\Controllers\API\ShuffleParticipantController;
use Illuminate\Support\Facades\Route;

Route::apiResource('shuffles', ShuffleController::class)->only(['index', 'show']);

Route::get('check-joined-address/{shuffle_id}/{address}', [ShuffleParticipantController::class, 'checkJoinedAddress']);
Route::post('shuffle-participants', [ShuffleParticipantController::class, 'store']);

Route::get('notification', [NotificationController::class, 'index']);


