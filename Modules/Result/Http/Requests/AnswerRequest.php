<?php

namespace Modules\Result\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnswerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'form_id'=>'required|numeric|exists:quizzes,id',
            'first_name'=>'nullable|string|between:2,250',
            'last_name'=>'nullable|string|between:2,250',
            'email'=>'required|email|between:2,250',
            'first_info'=>'nullable|string|between:2,250',
            'second_info'=>'nullable|string|between:2,250',
            'date_info'=>'nullable|string|between:2,250',
            'question'=>'nullable|array',
            'additional_info'=>'nullable|array',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
