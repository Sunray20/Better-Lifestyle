<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';

    protected $fillable = [
        'name', 'preparation_desc', 'preparation_time', 'preparation_difficulty', 'image_path'
    ];

    public function diets()
    {
        return $this->hasMany(Diet::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'food_ingredient')->withPivot('amount', 'unit');
    }

    public function incompatibleDiets()
    {
        return $this->belongsToMany(DietType::class, 'incompatible_food');
    }

    public function getMacroes()
    {
        $macros = new \stdClass();
        $macros->calorie = 0;
        $macros->protein = 0;
        $macros->carb = 0;
        $macros->fat = 0;

        $ingredients = $this->ingredients;
        foreach($ingredients as $ingredient)
        {
            $amount = $ingredient->amount;
            $actualAmount = $ingredient->pivot->amount;
            $percentage = ($actualAmount / $amount) * 100;
            //dd($percentage);

            $macros->calorie += round((($ingredient->calorie / 100) * $percentage), 0);
            $macros->protein += round((($ingredient->protein / 100) * $percentage), 1);
            $macros->carb += round((($ingredient->carb / 100) * $percentage), 1);
            $macros->fat += round((($ingredient->fat / 100) * $percentage), 1);
        }

        return $macros;
    }
}
