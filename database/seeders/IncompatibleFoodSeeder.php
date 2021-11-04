<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IncompatibleFoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('incompatible_food')->insert([
            'diet_type_id' => 1,
            'food_id' => 1,
        ]);
    }
}
