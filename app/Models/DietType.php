<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DietType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description'
    ];

    public function user()
    {
        return $this->belongsToMany(User::class, 'diet_type_user');
    }

    public function incompatibleFoods()
    {
        return $this->belongsToMany(Food::class, 'incompatible_food');
    }
}
