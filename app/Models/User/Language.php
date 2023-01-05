<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Modelsl\User\User;

class Language extends Model
{
    use HasFactory;

    protected $fillable = [
        'language',
        'level',
    ];

    // ユーザー
    public function user()
    {
        // ユーザーテーブルを持つ
        return $this->belongsTo(User::class);
    }
}
