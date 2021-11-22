<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcerciseExcerciseType extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['excercise_type_id', 'excercise_id'];

    protected $table = 'excercise_excercise_type';
}
