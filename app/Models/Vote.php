<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = ['program_detail_id', 'wallet', 'message', 'total_vote'];

    public function programDetail()
    {
         return $this->belongsTo(ProgramDetail::class);
    }
}
