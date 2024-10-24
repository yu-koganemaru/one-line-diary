<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            // 本文
            'main_text'=>[
                'required',
                'max:190'
            ],
            // 画像
            'image'=>[
                'mimes:jpg',
                'extensions:jpg'
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'main_text' => '投稿文',
            'image' => '投稿画像',
        ];
    }

    public function messages(): array
    {
        return [
          'required'=>':attributeは必須です。'
        ];
    }
}
