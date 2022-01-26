<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShuffleParticipant extends Model
{
    use HasFactory;

    public function shuffle()
    {
         return $this->belongsTo(Shuffle::class);
    }
}
