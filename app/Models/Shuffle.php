<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shuffle extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'price', 'total_winners_amount', 'status', 'started_at', 'ended_at'];

    public function shuffleParticipants()
    {
         return $this->hasMany(ShuffleParticipant::class);
    }
}
