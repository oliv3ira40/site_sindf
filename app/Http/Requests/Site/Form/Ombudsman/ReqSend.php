<?php

namespace App\Http\Requests\Site\Form\Ombudsman;

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
            'protocol_checkbox' => '',
            'protocol_number' => ($this->protocol_checkbox) ? '' : 'required',
            'name' => 'required',
            'registration' => 'required',
            'subject' => 'required|not_in:null',
            'stocking_unit' => 'required',
            'message' => 'required',
            'email' => 'required',
            'g-recaptcha-response' => 'required',
        ];
    }
}
