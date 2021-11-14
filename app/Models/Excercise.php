<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Excercise extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'description', 'image_path'];

    public $timestamps = false;

    public function excerciseHistories()
    {
        return $this->hasMany(ExcerciseHistory::class);
    }

    public function excerciseTypes()
    {
        return $this->belongsToMany(ExcerciseType::class, 'excercise_excercise_type');
    }

    public function workoutRoutines()
    {
        return $this->belongsToMany(WorkoutRoutine::class, 'excercise_workout_routine');
    }
}
