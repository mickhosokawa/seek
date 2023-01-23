<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    // ユーザー
    public function user()
    {
        // ユーザーテーブルを持つ
        return $this->belongsTo(User::class);
    }
}
