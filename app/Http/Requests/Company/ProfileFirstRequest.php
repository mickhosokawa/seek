<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class ProfileFirstRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        // 未実装
        return [
            'name' => 'required',
            'email' => 'required | regex:/^.+@.+$/i',
            'address' => 'required | min:10',
            'phone_number' => 'required',
            'url' => 'url',
            'industry' => '', // 業界を選択させたい
            'company_size' => '', // 範囲選択させたい
            'speciality' => '', 
            'mission' => '',
            'featured' => '',
            'other' => '',
        ];
    }

    /**
     * 
     */
    public function attributes()
    {
        return [
            'name' => 'Name',
            'email' => 'Email',
            'address' => 'Address',
            'phone_number' => 'Phone number',
            'url' => 'URL',
            'industry' => 'Industry', // 業界を選択させたい
            'company_size' => 'Company size', // 範囲選択させたい
            'speciality' => 'Speciality', 
            'mission' => 'Mission',
            'featured' => 'Featured',
            'other' => 'Other',
        ];
    }

    /**
     * 
     */
    public function messages()
    {
        return [
            'name.required' => ':attribute is required',
            'email.required' => ':attribute is required',
            'address.required' => ':attribute is required',
            'phone_number' => ':attribute is required',
            'url' => 'url must be type of url',
            // 'industry' => '', // 業界を選択させたい
            // 'company_size' => '', // 範囲選択させたい
            // 'speciality' => 'required', 
            // 'mission' => 'required',
            // 'featured' => 'required',
            // 'other' => '',
        ];
    }
}
