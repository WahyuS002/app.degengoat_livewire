<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shuffle extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'price', 'started_at', 'ended_at'];

    public function shuffleParticipations()
    {
         return $this->hasMany(ShuffleParticipation::class);
    }
}
