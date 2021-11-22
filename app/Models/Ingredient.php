<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'calorie', 'protein',
        'carb', 'fat', 'unit', 'amount', 'image_path'
    ];

    public function foods()
    {
        return $this->belongsToMany(Food::class, 'food_ingredient');
    }
}
