<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
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
            // 本文
            'main_text'=>[
                'max:190'
            ],
            // 画像
            'image'=>[
                'mimes:jpg',
                'extensions:jpg'
            ],
        ];
    }

    public function attributes()
    {
        return [
            'main_text' => '投稿文',
            'image' => '投稿画像',
        ];
    }

    public function messages()
    {
        return [
          
        ];
    }
}
