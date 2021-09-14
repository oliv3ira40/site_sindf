<?php

namespace App\Http\Requests\Site\User\SimpleUserValidation;

use Illuminate\Foundation\Http\FormRequest;

class ReqValidateDateOfBirth extends FormRequest
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
            'cpf' => 'required|max:11'
        ];
    }
}
