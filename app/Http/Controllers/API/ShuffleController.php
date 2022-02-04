<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\{
    ShuffleCollection, ShuffleResource
};
use App\Models\Shuffle;

class ShuffleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shuffles = Shuffle::latest()->get();
        return response()->success(ShuffleResource::collection($shuffles));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Shuffle $shuffle)
    {
        return response()->success(new ShuffleResource($shuffle));
    }
}
