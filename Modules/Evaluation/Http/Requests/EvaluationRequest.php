<?php

namespace Modules\Evaluation\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvaluationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'parent_id' => 'nullable|numeric|exist:evaluation,id',
            'name' => 'required|string|between:2,250',
            'description' => 'nullable|string|between:2,2000',
            'company_id' => 'required|numeric|exists:companies,id',
            'contact' => 'nullable|string|between:2,250',
            'start' => 'nullable|date',
            'deadline' => 'nullable|date',
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
