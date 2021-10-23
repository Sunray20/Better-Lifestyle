<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Excercise extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'description'];

    public function excerciseHistories()
    {
        return $this->hasMany(ExcerciseHistory::class);
    }

    public function workoutRoutines()
    {
        return $this->hasMany(WorkoutRoutine::class);
    }
}
