<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcerciseWorkoutRoutine extends Model
{
    use HasFactory;

    protected $table = 'excercise_workout_routine';

    protected $fillable = ['excercise_id', 'workout_routine_id'];

    public $timestamps = false;
}
