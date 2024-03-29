<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobOffer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_id',
        'title',
        'suburb_id',
        'sub_classification_id',
        'annual_salary',
        'hourly_pay',
        'job_type',
        'description',
        'is_display',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // ジョブオファーは複数のCompanyを持つ
    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function subClassification(){
        return $this->belongsTo(SubClassification::class);
    }

    public function suburb(){
        return $this->belongsTo(Suburb::class);
    }

    // 1つの求人情報は複数のユーザーからお気に入り登録される
    public function user(){
        return $this->belongsTo(User::class);
    }

    // 1つの求人情報は複数のいいねをもらう可能性がある
    public function savedJob()
    {
        return $this->hasMany(SavedJob::class);
    }
}
