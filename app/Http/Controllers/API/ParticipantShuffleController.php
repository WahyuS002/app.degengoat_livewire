<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use App\Models\ParticipantShuffle;
use App\Models\Shuffle;
use Illuminate\Http\Request;

class ParticipantShuffleController extends Controller
{
    public function joinedStatus(Participant $participant, Shuffle $shuffle)
    {
        if ($participant) {
            $is_participant = ParticipantShuffle::where(['participant_id' => $participant->id, 'shuffle_id' => $shuffle->id])->exists();
            return response()->json($is_participant);
        } else {
            return response()->json(false);
        }
    }

    public function show(Participant $participant, Shuffle $shuffle)
    {
         $participant = ParticipantShuffle::where(['participant_id' => $participant->id, 'shuffle_id' => $shuffle->id])->first();

         return response()->success($participant);
    }

    public function store(Request $request)
    {
        $current_participant = Participant::where('wallet_address', $request->wallet_address)->first();

        $participant_already_registered = ParticipantShuffle::where([
            'participant_id' => $current_participant->id,
            'shuffle_id' => $request->shuffle_id
        ])->exists();

        if (!$participant_already_registered) {
            ParticipantShuffle::create([
                'participant_id' => $current_participant->id,
                'shuffle_id' => $request->shuffle_id,
                'discord_username' => $current_participant->discord_username,
                'twitter_username' => $current_participant->twitter_username,
            ]);

            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => true,
                'message' => "You're already registered to this shuffle."
            ]);
        }
    }
}
