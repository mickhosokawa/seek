<?php

namespace App\Http\Requests\Company;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class SecondPostRequest extends FormRequest
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
        return [
            // 'awardTitle' => 'max:50|array|nullable',
            // 'awardTitle.*' => 'max:50|string|nullable',
            // 'cultureTitle' => 'max:50|array|nullable',
            // 'cultureTitle.*' => 'max:50|string|nullable', 
            // 'cultureDetail' => 'max:100|array|required_with:cultureTitle|nullable',
            // 'cultureDetail.*' => 'max:100|string|nullable|required_with:cultureTitle.*',
            // 'benefitTitle' => 'max:50|array|nullable', 
            // 'benefitTitle.*' => 'max:50|string|nullable',
            // 'benefitDetail' => 'max:100|array|required_with:benefitTitle|nullable', 
            // 'benefitDetail.*' => 'max:100|string|nullable|required_with:benefitTitle.*', 
        ];
    }

    /**
     * バリデーション項目定義
     * @return array
     */
    public function attributes()
    {
        return [
            // 'awardTitle' => 'Award title',
            // 'awardTitle.*' => 'Award title',
            // 'cultureTitle.*' => 'Culture title',
            // 'cultureDetail.*' => 'Culture detail',
            // 'cultureTitle' => 'Culture title',
            // 'cultureDetail' => 'Culture detail',
            // 'benefitTitle.*' => 'Benefit title',
            // 'benefitDetail.*' => 'Benefit detail',
            // 'benefitTitle' => 'Benefit title',
            // 'benefitDetail' => 'Benefit detail',
        ];
    }

    /**
     * バリデーションメッセージ
     * @return array
     */
    public function messages()
    {
        return [
            // 'awardTitle.*.max' => ':attribute is 50 word limit',
            // 'cultureTitle.*.max' => ':attribute is 50 word limit',
            // 'cultureDetail.*.max' => 'C:attribute is 100 word limit',
            // 'benefitTitle.*.max' => ':attribute is 50 word limit',
            // 'benefitDetail.*.max' => 'B:attribute is 100 word limit',
            // 'awardTitle.max' => ':attribute is 50 word limit',
            // 'cultureTitle.max' => ':attribute is 50 word limit',
            // 'cultureDetail.max' => 'C:attribute is 100 word limit',
            // 'benefitTitle.max' => ':attribute is 50 word limit',
            // 'benefitDetail.max' => 'B:attribute is 100 word limit',
        ];
    }
}
