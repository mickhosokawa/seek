<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicenceOrCertification extends Model
{
    use HasFactory;

    protected $fillable = [
        'licence_name',
        'issuing_organization',
        'issue_year',
        'issue_month',
        'expiry_year',
        'expiry_month',
        'is_expired',
        'description',
    ];

    // ユーザー
    public function user()
    {
        // ユーザーテーブルを持つ
        return $this->belongsTo(User::class);
    }
}
