<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = ['wallet_address', 'discord_username', 'twitter_username', 'ip_address'];

    public function getRouteKeyName()
    {
         return 'wallet_address';
    }

    public function shuffles()
    {
         return $this->belongsToMany(Shuffle::class);
    }
}
