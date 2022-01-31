<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'active', 'started_at', 'ended_at'];

    public function scopeActive($query)
    {
         return $query->where('active', 1);
    }

    public function scopeNonActive($query)
    {
         return $query->where('active', 0);
    }
}
