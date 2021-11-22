<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\ActivityLevel;

class ValidateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sex' => 'required|min:0|max:1',
            'age' => 'required|integer|min:1|max:120',
            'height' => 'required|numeric|min:1|max:250',
            'height_unit' => 'required|string|in:cm,feet',
            'weight' => 'required|numeric|min:10|max:250',
            'weight_unit' => 'required|string|in:kg,pound',
            'target_weight' => 'required|numeric|min:10|max:250',
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $activityLevels = ActivityLevel::all();
            $activityLevel = $this->request->get('activity_level');

            if(!in_array($activityLevel, $activityLevels->pluck('id')->toArray())) {
                $validator->errors()->add('activity_level', 'Unsupported activity level!');
            }
        });
    }
}
