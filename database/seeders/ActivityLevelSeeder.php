<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivityLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Sedentary',         'description' => 'Little or no exercise', 'activity_factor_for_tdee' => 1.2],
            ['name' => 'Lightly active',    'description' => 'Sports 1-3 days/week', 'activity_factor_for_tdee' => 1.375],
            ['name' => 'Moderately active', 'description' => 'Sports 3-5 days/week', 'activity_factor_for_tdee' => 1.55],
            ['name' => 'Very active',       'description' => 'Sports 6-7 days a week', 'activity_factor_for_tdee' => 1.725],
            ['name' => 'Extra active',      'description' => 'Very hard exercise and a physical job', 'activity_factor_for_tdee' => 1.9],
        ];
        DB::table('activity_levels')->insert($data);
    }
}
