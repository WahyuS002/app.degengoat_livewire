<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ParticipantShuffle extends Pivot
{
    use HasFactory;

    protected $table = 'participant_shuffle';

    protected $fillable = ['participant_id', 'shuffle_id', 'position', 'is_winner'];
}
