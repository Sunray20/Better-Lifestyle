<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExcerciseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'chest'],
            ['name' => 'back'],
            ['name' => 'legs'],
            ['name' => 'biceps'],
            ['name' => 'triceps'],
            ['name' => 'forearms'],
            ['name' => 'shoulders'],
            ['name' => 'abdominals']
        ];
        DB::table('excercise_types')->insert($data);
    }
}
