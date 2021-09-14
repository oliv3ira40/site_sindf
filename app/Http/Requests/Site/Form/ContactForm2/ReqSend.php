<?php

namespace App\Http\Requests\Site\Form\ContactForm2;

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
            'contact_form2.name' => 'required',
            'contact_form2.telephone' => 'required',
            'contact_form2.cpf_or_cnpj' => 'required',
            'contact_form2.subject' => 'required|not_in:null',
            'contact_form2.message' => 'required',
            'contact_form2.email' => 'required',
            'g-recaptcha-response' => 'required',
        ];
    }
}
