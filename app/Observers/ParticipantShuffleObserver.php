<?php

namespace App\Observers;

use App\Models\ParticipantShuffle as Participant;

class ParticipantShuffleObserver
{
    public function creating(Participant $participant)
    {
        if (is_null($participant->position)) {
            $participant->position = Participant::where('shuffle_id', $participant->shuffle_id)->max('position') + 1;
            return;
        }

        $lowerPriorityParticipants = Participant::where('shuffle_id', $participant->shuffle_id)
            ->where('position', '>=', $participant->position)
            ->get();

        foreach ($lowerPriorityParticipants as $lowerPriorityParticipanat) {
            $lowerPriorityParticipanat->position++;
            $lowerPriorityParticipanat->saveQuietly();
        }
    }
}
