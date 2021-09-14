<?php

namespace App\Http\Requests\Admin\Site\Evaluation\AvailableQuestion;

use Illuminate\Foundation\Http\FormRequest;

class reqUpdate extends FormRequest
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
            'position'                                  =>  'nullable',
            'question_text'                             =>  'bail|required|max:500',
            'description'                               =>  'bail|nullable|max:1000',
            'title_confirmation_text'                   =>  'bail|nullable|max:200',
            'confirmation_text'                         =>  'bail|nullable|max:10000',
            'reading_the_mandatory_confirmation_text'   =>  'nullable',
            'evaluation_id'                             =>  'required',
            'question_topic_id'                         =>  'nullable',
            'question_type_id'                          =>  'required',
        ];
    }
}
