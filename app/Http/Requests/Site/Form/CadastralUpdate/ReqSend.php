<?php

namespace App\Http\Requests\Site\Form\CadastralUpdate;

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
            'company_name' => 'required',
            'fantasy_name' => 'required',
            'cpf_or_cnpj' => 'required',
            'address' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'g-recaptcha-response' => 'required',
        ];
    }
}
