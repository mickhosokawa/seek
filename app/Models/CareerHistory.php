<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'role',
        'user_id',
        'job_title',
        'company_name',
        'started_year',
        'started_month',
        'ended_year',
        'ended_month',
        'description',
    ];

    // ユーザー
    public function user()
    {
        // ユーザーテーブルを持つ
        return $this->belongsTo(User::class);
    }
}
