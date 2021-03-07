<?php

namespace Modules\Quiz\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
            'parent_id'=>'nullable|numeric|exists:questions,id',
            'form_id'=>'required|numeric|exists:quizzes,id',
            'type'=>'nullable|string|between:2,250',
            'description'=>'nullable|string|between:2,1000',
            'requirement'=>'nullable|boolean',
            'additional_info'=>'nullable|boolean',
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
