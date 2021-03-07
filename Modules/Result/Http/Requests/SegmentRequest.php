<?php

namespace Modules\Result\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SegmentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'segment_title'=>'required|string|between:2,250',
            'min_score'=>'required|numeric',
            'max_score'=>'required|numeric',
            'result_body'=>'nullable|string|between:2,1000',
            'form_id'=>'required|numeric|exists:quizzes,id',
            'file' => 'nullable|max:20000|mimes:png,jpeg,jpg',
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
