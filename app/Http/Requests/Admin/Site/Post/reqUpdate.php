<?php

namespace App\Http\Requests\Admin\Site\Post;

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
            'title' => 'bail|required|max:500', //500
            'thin_line' => 'bail|max:5000', //5000
            'content' => 'bail|max:15000', //15000
            'metakey' => 'bail|max:400', //400
            'image_banner' => 'bail|image', //300
            'image_spotlight' => 'bail|image', //300

            'author_id' => 'bail|required|not_in:null',
            'status_post_id' => 'bail|required|not_in:null',
        ];
    }
}
