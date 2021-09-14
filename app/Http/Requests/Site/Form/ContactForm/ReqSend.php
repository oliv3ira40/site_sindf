<?php

namespace App\Http\Requests\Site\Form\ContactForm;

use Illuminate\Foundation\Http\FormRequest;

class ReqSend extends FormRequest
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
            'name' => 'required',
            'registration' => 'required',
            'stocking_unit' => 'required',
            'subject' => 'required',
            'message' => 'required',
            'email' => 'required',
            'g-recaptcha-response' => 'required',
        ];
    }
}
