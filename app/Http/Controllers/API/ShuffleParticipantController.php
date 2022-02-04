<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ShuffleParticipant;
use Illuminate\Http\Request;

class ShuffleParticipantController extends Controller
{
    public function checkJoinedAddress($shuffle_id, $address)
    {
        $addresses = ShuffleParticipant::where('shuffle_id', $shuffle_id)->pluck('wallet_address')->toArray();
        if (in_array($address, $addresses)) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $restrictedIpAddress = ShuffleParticipant::where('shuffle_id', $request->participant['shuffle_id'])
                                ->pluck('ip_address')->toArray();
        if (in_array($request->ip(), $restrictedIpAddress)) {
            return response()->json([
                'success' => false,
                'message'  => 'Something went wrong.'
            ], 500);
        }

        $restrictedMacAddress = ShuffleParticipant::where('shuffle_id', $request->participant['shuffle_id'])
                                ->pluck('mac_address')->toArray();
        if (in_array(substr(shell_exec('getmac'), 159, 20), $restrictedMacAddress)) {
            return response()->json([
                'success' => false,
                'message'  => 'Something went wrong.'
            ], 500);
        }
        $participant = $request->participant;
        $participant['ip_address'] = $request->ip();
        $participant['mac_address'] = substr(shell_exec('getmac'), 159, 20);

        ShuffleParticipant::create($participant);
        return response()->json([
            'success' => true
        ]);
    }
}
