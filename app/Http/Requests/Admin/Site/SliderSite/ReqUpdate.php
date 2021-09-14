<?php

namespace App\Http\Requests\Admin\Site\SliderSite;

use Illuminate\Foundation\Http\FormRequest;

class ReqUpdate extends FormRequest
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
            'title' => 'bail|max:80',
            'subtitle' => 'bail|max:100',
            'img' => 'bail|max:400',
            'link' => 'bail|max:400',
            'target' => 'bail|max:10',
        ];
    }
}
