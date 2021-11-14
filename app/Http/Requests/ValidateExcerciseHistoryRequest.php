<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateExcerciseHistoryRequest extends FormRequest
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
            'excercise_id' => 'sometimes|required',
            'target_amount' => 'required|min:1|max:200',
            'achieved_amount' => 'min:0|max:200',
            'target_weight' => 'required|min:1|max:200',
            'achieved_weight' => 'min:0|max:200',
            'date' => 'sometimes|required|date|after_or_equal:monday this week|before_or_equal:sunday this week'
        ];;
    }

}
