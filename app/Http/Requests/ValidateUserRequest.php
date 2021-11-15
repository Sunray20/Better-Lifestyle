<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'height' => 'required|numeric|min:10|max:250',
            'height_unit' => 'required|string',
            'weight' => 'required|numeric|min:10|max:250',
            'weight_unit' => 'required|string',
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
            // TODO: fix hardcode
            if($this->request->get('weight_unit') != 'kg' && $this->request->get('weight_unit') != 'pound') {
                $validator->errors()->add('weight_unit', 'Unsupported unit!');
            }

            if($this->request->get('height_unit') != 'cm' && $this->request->get('height_unit') != 'inch') {
                //dd($this->request->get('height_unit'));
                $validator->errors()->add('height_unit', 'Unsupported unit!');
            }
        });
    }
}
