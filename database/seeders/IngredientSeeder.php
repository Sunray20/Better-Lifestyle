<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingredients')->insert([
            'name' => 'Apple',
            'user_id' => 1, // Admin user
            'calorie' => 52,
            'protein' => 0.3,
            'carb' => 13.8,
            'fat' => 0.2,
            'unit' => 'g',
            'amount' => 100,
            'image_path' => time() . 'apple_stock.png',
        ]);

        DB::table('ingredients')->insert([
            'name' => 'Banana',
            'user_id' => 1,
            'calorie' => 105,
            'protein' => 1.3,
            'carb' => 27,
            'fat' => 0.4,
            'unit' => 'g',
            'amount' => 118,
            'image_path' => time() . 'banana_stock.png',
        ]);
    }
}
