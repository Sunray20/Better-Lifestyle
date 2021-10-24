<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => Hash::make('test'),
            'is_admin' => 0,
            'email_verified_at' => '2021-10-18 11:04:44',
        ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'is_admin' => 1,
            'email_verified_at' => '2021-10-18 11:04:44',
        ]);

        DB::table('excercises')->insert([
            'name' => 'Pull up',
            'type' => 'chest',
            'description' => 'Very good excercise'
        ]);

        DB::table('excercise_histories')->insert([
            'excercise_id' => 1,
            'user_id' => 1,
            'target_amount' => 10,
            'achieved_amount' => 11,
            'target_weight' => 5,
            'achieved_weight' => 5,
            'date' => '2021-10-23'
        ]);
    }
}
