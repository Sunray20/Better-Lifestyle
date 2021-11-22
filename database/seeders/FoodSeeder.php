<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('foods')->insert([
            'name' => 'Fruit Salad',
            'user_id' => 1,
            'preparation_desc' => 'You should mix together the ingredients, and serve it cold.',
            'preparation_time' => 15,
            'preparation_difficulty' => 1,
            'image_path' => 'fruit_salad_stock.png'
        ]);
    }
}
