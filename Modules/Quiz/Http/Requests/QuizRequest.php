<?php

namespace Modules\Quiz\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizRequest extends FormRequest
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
            'type'=>'nullable|string|between:2,250',
            'description'=>'nullable|string|between:2,1000',
            'first_name_label'=>'nullable|string|between:2,250',
            'first_name_requirement'=>'nullable|boolean',
            'last_name_label'=>'nullable|string|between:2,250',
            'last_name_requirement'=>'nullable|boolean',
            'email_label'=>'nullable|string|between:2,250',
            'email_requirement'=>'nullable|boolean',
            'first_info_label'=>'nullable|string|between:2,250',
            'first_info_status'=>'nullable|boolean',
            'second_info_label'=>'nullable|string|between:2,250',
            'second_info_status'=>'nullable|boolean',
            'date_info_label'=>'nullable|string|between:2,250',
            'date_info_status'=>'nullable|boolean',
            'placeholder'=>'nullable|boolean',
            'file' => 'nullable|max:20000|mimes:png,jpeg,jpg',
            'rbanner' => 'nullable|max:20000|mimes:png,jpeg,jpg',
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
