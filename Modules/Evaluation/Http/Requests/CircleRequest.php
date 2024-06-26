<?php

namespace Modules\Evaluation\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CircleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required|string|between:2,250',
            'start_date'=>'required|date',
            'end_date'=>'required|date',
            'status'=>'required|integer|between:1,9',
            'evaluation_id'=>'required|numeric|exists:evaluations,id',
            'user_id'=>'required|numeric|exists:users,id',
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
