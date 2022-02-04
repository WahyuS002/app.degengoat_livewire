<?php

use App\Http\Controllers\API\ShuffleController;
use App\Http\Controllers\Api\ShuffleParticipantController;
use Illuminate\Support\Facades\Route;

Route::apiResource('shuffles', ShuffleController::class)->only(['index', 'show']);

Route::get('check-joined-address/{shuffle_id}/{address}', [ShuffleParticipantController::class, 'checkJoinedAddress']);
Route::apiResource('shuffle-participants', ShuffleParticipantController::class)->only(['show', 'store']);

