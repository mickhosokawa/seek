<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use DateTime;

class DateTimeRequest extends FormRequest
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
            'job_title' => 'required',
            'company_name' => 'required',
            'started_year' => 'required|date',
            'started_month' => 'required',
            'ended_year' => 'required|date',
            'ended_month' => 'required',
            'started_career_date' => 'before_or_equal:ended_career_date',
            'ended_career_date' => 'after_or_equal:started_career_date',
        ];
    }

    /**
     * 開始月、開始日と終了月、終了日を結合する
     */
    protected function prepareForValidation()
    {
        $date = new DateTime();

        $started_career_date = $date->format($this->started_year.'-'.$this->started_month);
        $ended_career_date =  $date->format($this->ended_year.'-'.$this->ended_month);

        // 現在も勤めている場合
        if($ended_career_date === '-'){
            $ended_career_date = $date->format('Y-m');
        }

        $this->merge([
            'started_career_date' => $started_career_date,
            'ended_career_date' => $ended_career_date,
        ]);
    }

    public function messages()
    {
        return [
            'started_career_date.before_or_equal:ended_career_date' => 'test',
            'ended_career_date.after_or_equal:started_career_date' => 'test1',
        ];
    }


}
