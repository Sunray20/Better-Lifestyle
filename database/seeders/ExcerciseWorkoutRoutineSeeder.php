<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExcerciseWorkoutRoutineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('excercise_workout_routine')->insert([
            'excercise_id' => 1,
            'workout_routine_id' => 1
        ]);

        DB::table('excercise_workout_routine')->insert([
            'excercise_id' => 2,
            'workout_routine_id' => 1
        ]);
    }
}
