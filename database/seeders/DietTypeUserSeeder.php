<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DietTypeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('diet_type_user')->insert([
            'diet_type_id' => 1,
            'user_id' => 1
        ]);

        DB::table('diet_type_user')->insert([
            'diet_type_id' => 2,
            'user_id' => 1
        ]);
    }
}
