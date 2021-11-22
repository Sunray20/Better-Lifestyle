<?php

namespace App\Helpers;

use App\Models\User;
use App\Models\DietType;
use App\Models\DietTypeUser;
use App\Models\ActivityLevel;
use App\Http\Requests\ValidateUserRequest;

class Utilities {
    private static function moveImage()
    {

    }

    private static function calculateBMR($weight, $height, $age, $sex)
    {
        $bmr = 10 * floatval($weight) + 6.25 * floatval($height) - 5 * intval($age) + 5;
        return $bmr;
    }

    public static function calculateTargetCalories(ValidateUserRequest $request)
    {
        $sex = $request->validated('sex');
        $weight = $request->validated('weight')['weight'];
        $height = $request->validated('height')['height'];
        $age = $request->validated('age')['age'];

        $bmr = self::calculateBMR($weight, $height, $age, $sex);

        $activityLevel = ActivityLevel::where('id', $request->get('activity_level'))->first('activity_factor_for_tdee');
        $targetCalories = $bmr * $activityLevel->activity_factor_for_tdee;

        return $targetCalories;
    }


}
