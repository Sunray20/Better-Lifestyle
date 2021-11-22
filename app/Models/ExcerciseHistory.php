<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcerciseHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'excercise_id', 'target_amount', 'achieved_amount', 'target_weight', 'achieved_weight', 'date'
    ];

    public function excercise()
    {
        return $this->belongsTo(Excercise::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
