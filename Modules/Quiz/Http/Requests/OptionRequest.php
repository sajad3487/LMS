<?php

namespace Modules\Quiz\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OptionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'body'=>'required|string|between:2,250',
            'score'=>'required|numeric',
            'status'=>'nullable|boolean',
            'question_id'=>'required|numeric|exists:questions,id',
            'form_id'=>'required|numeric|exists:quizzes,id',
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
