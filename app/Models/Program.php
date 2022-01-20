<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = ['program_name'];

    public function programDetails()
    {
         return $this->hasMany(ProgramDetail::class);
    }
}
