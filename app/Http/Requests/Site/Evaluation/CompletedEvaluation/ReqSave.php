<?php

namespace App\Http\Requests\Site\Evaluation\CompletedEvaluation;

use Illuminate\Foundation\Http\FormRequest;

class ReqSave extends FormRequest
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
            'questions.*' => 'bail|required|not_in:null',
            'textarea_questions.*' => 'bail|required|not_in:null|max:1000',
            'quest_w_conf_t_required_reading.*' => 'bail|required|not_in:null'
        ];
    }
}
