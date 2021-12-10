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

    private static function calculateBMR($weight, $weightUnit, $height, $heightUnit, $age, $sex)
    {
        ($weightUnit == 'pound') ? $weight /= 2.2 : $weight;
        ($heightUnit == 'feet') ? $height *= 30.48 : $height;

        // Male
        if($sex == 0) {
            $bmr = 10 * floatval($weight) + 6.25 * floatval($height) - 5 * intval($age) + 5;
        } else {
            $bmr = 10 * floatval($weight) + 6.25 * floatval($height) - 5 * intval($age) - 161;
        }

        return $bmr;
    }

    public static function calculateTargetCalories(ValidateUserRequest $request)
    {
        // TODO: Conversion to kg and cm
        $sex = $request->validated('sex')['sex'];
        $weight = $request->validated('weight')['weight'];
        $weightUnit = $request->validated('weight_unit')['weight_unit'];
        $height = $request->validated('height')['height'];
        $heightUnit = $request->validated('height_unit')['height_unit'];
        $age = $request->validated('age')['age'];

        //dd($request);

        $bmr = self::calculateBMR($weight, $weightUnit, $height, $heightUnit, $age, $sex);

        $activityLevel = ActivityLevel::where('id', $request->get('activity_level'))->first('activity_factor_for_tdee');
        $targetCalories = $bmr * $activityLevel->activity_factor_for_tdee;

        //dd($targetCalories);

        return $targetCalories;
    }


}
