<?php

namespace Modules\Result\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAnswerQuestionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'answer'=>'required|string|between:2,250',
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
