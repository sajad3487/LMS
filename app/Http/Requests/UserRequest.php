<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required', 'string', 'max:255',
            'company_id' => 'nullable|numeric|exists:companies,id',
            'position' => 'nullable|string|max:255',
            'tell' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'user_type' => 'nullable|numeric|max:20',
            'email' => 'nullable|string|email|max:255|unique:users',
        ];
    }
}
