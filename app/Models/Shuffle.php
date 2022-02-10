<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Shuffle extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['title', 'price', 'total_winners_amount', 'status', 'started_at', 'ended_at'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
          return 'slug';
    }

    public function participants()
    {
         return $this->belongsToMany(Participant::class);
    }
}
