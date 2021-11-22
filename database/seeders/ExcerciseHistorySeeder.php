<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExcerciseHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('excercise_histories')->insert([
            'excercise_id' => 1,
            'user_id' => 1,
            'target_amount' => 10,
            'achieved_amount' => 11,
            'target_weight' => 5,
            'achieved_weight' => 5,
            'date' => date('Y-m-d')
        ]);
    }
}
