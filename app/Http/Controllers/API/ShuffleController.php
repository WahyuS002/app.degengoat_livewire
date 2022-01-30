<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShuffleResource;
use App\Models\Shuffle;

class ShuffleController extends Controller
{
    public function getActiveShuffle()
    {
        $data = Shuffle::where('status', 'opened')->first();
        return $data
            ?  response()->success($data)
            :  response()->error('Shuffle data not found', 404);
    }
}
