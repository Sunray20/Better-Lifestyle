<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    public function diets()
    {
        return $this->belongsToMany(Diet::class, 'diet_food');
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'food_ingredients');
    }

    public function incompatibleDiets()
    {
        return $this->belongsToMany(DietType::class, 'incompatible_food');
    }
}
