<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodIngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('food_ingredient')->insert([
            'food_id' => 1,
            'ingredient_id' => 1
        ]);

        DB::table('food_ingredient')->insert([
            'food_id' => 1,
            'ingredient_id' => 2
        ]);
    }
}
