<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExcerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('excercises')->insert([
            'name' => 'Pull up',
            'type' => 'chest',
            'description' => 'Very good excercise for training the chest'
        ]);

        DB::table('excercises')->insert([
            'name' => 'Push up',
            'type' => 'triceps',
            'description' => 'Recommended for bodyweight training routines'
        ]);
    }
}
