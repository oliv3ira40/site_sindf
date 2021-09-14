<?php

namespace App\Http\Requests\Site\Auth\reset;

use Illuminate\Foundation\Http\FormRequest;

class reqSaveNewPassword extends FormRequest
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
            'password' => 'bail|required|min:5|confirmed',
            'password_confirmation' => 'bail|required|min:5',
        ];
    }
}
