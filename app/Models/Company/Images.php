<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class Images extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'company_id',
        'image',
        'is_pr_image',
    ];

    // 企業テーブルが親
    public function company(){
        return $this->belongsTo(Company::class);
    }
}