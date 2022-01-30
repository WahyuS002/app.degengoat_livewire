<?php

use App\Http\Controllers\API\ShuffleController;
use Illuminate\Support\Facades\Route;

Route::get('get-active-shuffle', [ShuffleController::class, 'getActiveShuffle']);

