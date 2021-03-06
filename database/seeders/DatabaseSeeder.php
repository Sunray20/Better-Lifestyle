<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ActivityLevelSeeder::class,
            UserSeeder::class,
            ExcerciseSeeder::class,
            ExcerciseHistorySeeder::class,
            WorkoutRoutineSeeder::class,
            ExcerciseWorkoutRoutineSeeder::class,
            ExcerciseTypeSeeder::class,
            ExcerciseExcerciseTypeSeeder::class,
            IngredientSeeder::class,
            FoodSeeder::class,
            FoodIngredientSeeder::class,
            DietTypeSeeder::class,
            DietTypeUserSeeder::class,
            IncompatibleFoodSeeder::class,
        ]);
    }
}
