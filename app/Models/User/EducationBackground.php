<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;

class EducationBackground extends Model
{
    use HasFactory;

    protected $fillable = [
        'institution',
        'major',
        'degree',
        'is_finished',
        'finished_year',
        'expected_year',
        'description',
    ];

    // ユーザー
    public function user()
    {
        // ユーザーテーブルを持つ
        return $this->belongsTo(User::class);
    }
}
