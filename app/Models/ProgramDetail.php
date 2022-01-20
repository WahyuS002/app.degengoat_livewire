<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramDetail extends Model
{
    use HasFactory;

    protected $fillable = ['program_id', 'image', 'title', 'description'];

    public function program()
    {
         return $this->belongsTo(Program::class);
    }

    public function votes()
    {
         return $this->hasMany(Vote::class);
    }
}
