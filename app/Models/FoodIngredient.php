<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodIngredient extends Model
{
    use HasFactory;

    protected $table = 'food_ingredient';

    protected $fillable = ['food_id', 'ingredient_id', 'amount', 'unit'];

    public $timestamps = false;
}
