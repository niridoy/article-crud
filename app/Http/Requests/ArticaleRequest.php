<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticaleRequest extends FormRequest
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
            'title' => 'required',
            'slug' =>   ['required','unique:articles,slug,'.$this->id],
            'excerpt' => 'required',
            'content' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keyword' => 'required',
            'category' => 'required',
            'image' => 'required'
            // 'image' => ['required','mimes:png,jpg,jpeg','max:1024MB']
        ];
    }
}
