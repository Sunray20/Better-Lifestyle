<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DietTypeUser extends Model
{
    use HasFactory;

    protected $table = 'diet_type_user';

    protected $fillable = ['diet_type_id', 'user_id'];

    public $timestamps = false;
}
