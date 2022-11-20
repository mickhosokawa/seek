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
            // 'email' => 'required | regex:/^.+@.+$/i',
            // 'address' => 'required | min:10',
            // 'phone_number' => 'required',
            // 'url' => 'url',
            // 'industry' => 'required', // 業界を選択させたい
            // 'company_size' => 'required', // 範囲選択させたい
            // 'speciality' => 'required', 
            // 'mission' => 'required',
            // 'featured' => 'required',
            // 'other' => '',
        ];
    }
}
