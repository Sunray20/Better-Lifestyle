<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkoutRoutineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('workout_routines')->insert([
            'name' => 'Beginner full body routine',
            'description' => 'We recommend this routine for the absolute beginners.'
        ]);

        DB::table('workout_routines')->insert([
            'name' => 'Intermediate full body routine',
            'description' => 'This is for advanced trainees.'
        ]);
    }
}
