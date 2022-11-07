<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class JobPostRequest extends FormRequest
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
     * バリデーションのルール設定
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|min:10|max:100',
            'suburb' => 'required',
            'sub_classification' => 'required',
            'annual_salary' => 'required|min:0',
            'hourly_pay' => 'required|min:0',
            'job_type' => 'required',
            'description' => 'required|min:100|max:1000',
        ];
    }
}
