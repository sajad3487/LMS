<?php

namespace Modules\Evaluation\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|string|between:2,250',
            'phone'=>'nullable|string|between:2,250',
            'address'=>'nullable|string|between:2,250',
            'website'=>'nullable|string|between:2,250',
            'email'=>'nullable|string|between:2,250',
            'type'=>'nullable|string|between:2,250',
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
