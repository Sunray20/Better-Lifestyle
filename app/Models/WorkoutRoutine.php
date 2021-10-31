<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkoutRoutine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description'
    ];

    public function excercises()
    {
        return $this->belongsToMany(Excercise::class, 'excercise_workout_routine');
    }
}
