<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\ExcerciseType;

class ValidateExcerciseRequest extends FormRequest
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
            'name' => 'required|max:50',
            'description' => 'required|string',
            'image_path' => 'nullable|mimes:jpg,png,jpeg|max:5048',
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
            $isTypeSelected = false;
            $excerciseTypes = ExcerciseType::all();
            foreach($excerciseTypes as $excerciseType)
            {
                if($this->request->get($excerciseType->name) !== null)
                {
                    $isTypeSelected = true;
                }
            }

            if (!$isTypeSelected) {
                $validator->errors()->add($excerciseTypes->first()->name, 'At least one excercise type needs to be selected!');
            }
        });
    }
}
