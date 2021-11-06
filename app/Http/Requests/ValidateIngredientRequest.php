<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateIngredientRequest extends FormRequest
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
            'name' => 'required|max:80',
            'calorie' => 'required|integer|between:0,9999',
            'protein' => 'required|numeric|between:0,9999',
            'carb' => 'required|numeric|between:0,9999',
            'fat' => 'required|numeric|between:0,9999',
            'unit' => 'required|in:g,pound,dL,mL',
            'amount' => 'required|numeric|between:0,9999',
            'image_path' => 'nullable|mimes:jpg,png,jpeg|max:5048',
            //'validated' => 'accepted',
        ];
    }
}
