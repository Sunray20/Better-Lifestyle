<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcerciseHistory extends Model
{
    use HasFactory;

    public function excercise()
    {
        return $this->belongsTo(Excercise::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
