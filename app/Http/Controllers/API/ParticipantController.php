<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Participant\StoreParticipantRequest;
use App\Http\Resources\ParticipantResource;
use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function checkRegistered($wallet_address)
    {
        $is_registered = Participant::where('wallet_address', $wallet_address)->exists();
        return response()->json($is_registered);
    }

    // public function show(Participant $participant)
    // {
    //      return response()->success(new ParticipantResource($participant));
    // }

    public function store(StoreParticipantRequest $request)
    {
        $data = $request->validated();
        $data['ip_address'] = $request->ip();

        $participant = Participant::create($data);
        return response()->success($participant);
    }
}
