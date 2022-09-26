<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
        $rules = [
            'title' => 'required|unique:blogs,title',
            'slug' => 'required|unique:blogs,slug',
            'category_id' => 'required',
            'content' => 'required',
        ];

        $id = $this->route('id');
        if ($id) {
            $rules['title'] = 'required|unique:blogs,title,' . $id;
            $rules['slug'] = 'required|unique:blogs,slug,' . $id;
        } 

        return $rules;
    }
}
