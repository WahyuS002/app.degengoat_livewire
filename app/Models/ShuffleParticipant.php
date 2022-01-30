<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShuffleParticipant extends Model
{
    use HasFactory;

    protected $fillable = ['shuffle_id', 'discord_username', 'twitter_username', 'wallet_address', 'ip_address', 'is_winner'];

    public function shuffle()
    {
         return $this->belongsTo(Shuffle::class);
    }

    public function scopeWinners($query)
    {
        return $query->where('is_winner', true);
    }
}
