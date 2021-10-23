<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DietType extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function incompatibleFoods()
    {
        return $this->belongsToMany(IncompatibleFood::class, 'incompatible_food');
    }
}
