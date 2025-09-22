<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        if ($this->has('back')) {
        return [];
    }
    
        return [
            'name' => ['required'],
            'price' => ['required','integer', 'max:10000', 'min:0 '],
            'image' => ['required', 'mimes:jpeg,png'],
            'description' => ['required', 'max:120'],
            'season_id'   => ['required', 'array'],
            'season_id.*' => ['exists:seasons,id'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '商品名を入力してください',
            'price.required' => '値段を入力してください',
            'price.integer' => '数値で入力してください',
            'price.max' => '0～10000円以内で入力してください',
            'price.min' => '0～10000円以内で入力してください',
            'image.required' => '商品画像を登録してください',
            'image.mimes' => '「.png」または「.jpeg」形式でアップロードしてください',
            'season_id.required'   => '季節を選択してください',
            'description.required' => '商品説明を入力してください',
            'description.max' => '120文字以内で入力してください'
        ];
    }
}
