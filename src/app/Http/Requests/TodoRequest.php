<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['required'],
            'status_id' => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Todoを入力してください',
            'title.string' => 'Todoを文字列で入力してください',
            'title.max' => 'Todoを255文字以内で入力してください',
            'category_id.required' => 'categoryを入力してください',
            'status_id.required' => 'statusを入力してください',
        ];
    }
}
