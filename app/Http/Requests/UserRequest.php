<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required','string','max:60'],
            'email' => ['required','string','max:254','email:rfc', Rule::unique('users')->ignore($this->id)],
            'tel' =>['required','numeric','max_digits:20', Rule::unique('users')->ignore($this->id)],
            'address' =>['required','string','max:161'],
        ];
    }

    public function messages()
    {
        return [
            'tel.max_digits' => '電話番号は20桁以下で入力してください',
        ];
    }
}
