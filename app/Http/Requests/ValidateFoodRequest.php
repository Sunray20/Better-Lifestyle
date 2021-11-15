<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateFoodRequest extends FormRequest
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
            'name' => 'required|string|max:80',
            'preparation_desc' => 'required|string',
            'preparation_time' => 'required|min:1|max:999',
            'preparation_difficulty' => 'required|integer|min:1|max:5',
            'image_path' => 'nullable|mimes:jpg,png,jpeg|max:5048',
        ];
    }
}
