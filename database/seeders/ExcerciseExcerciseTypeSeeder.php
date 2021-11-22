<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExcerciseExcerciseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['excercise_id' => 1, 'excercise_type_id' => 2],
            ['excercise_id' => 1, 'excercise_type_id' => 4],
            ['excercise_id' => 1, 'excercise_type_id' => 6],
            ['excercise_id' => 2, 'excercise_type_id' => 1],
            ['excercise_id' => 2, 'excercise_type_id' => 5],
            ['excercise_id' => 2, 'excercise_type_id' => 6],
        ];
        DB::table('excercise_excercise_type')->insert($data);
    }
}
