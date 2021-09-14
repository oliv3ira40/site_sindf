<?php

namespace App\Http\Requests\Site\Auth\reset;

use Illuminate\Foundation\Http\FormRequest;

class reqValidatePersonalData extends FormRequest
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
            'cpf' => 'required',
            'registration' => 'required',
            'date_of_birth' => 'required',
            'g-recaptcha-response' => 'required',
        ];
    }
}
