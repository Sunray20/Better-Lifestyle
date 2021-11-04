<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    // TODO: check why it's required
    protected $table = 'foods';

    protected $fillable = [
        'name', 'preparation_desc', 'preparation_time', 'preparation_difficulty', 'image_path'
    ];

    public function diets()
    {
        return $this->belongsToMany(Diet::class, 'diet_food');
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'food_ingredient');
    }

    public function incompatibleDiets()
    {
        return $this->belongsToMany(DietType::class, 'incompatible_food');
    }
}
