<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DietTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('diet_types')->insert([
            'name' => 'Vegan',
            'description' => 'This is the description of vegan diet'
        ]);

        DB::table('diet_types')->insert([
            'name' => 'Ketogenic',
            'description' => 'This is the description of ketogenic diet'
        ]);
    }
}
