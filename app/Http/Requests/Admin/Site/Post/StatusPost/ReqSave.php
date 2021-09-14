<?php

namespace App\Http\Requests\Admin\Site\Post\StatusPost;

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
            'name' => 'bail|required|max:30',
        ];
    }
}
