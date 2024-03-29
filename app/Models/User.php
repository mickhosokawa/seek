<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\CareerHistory;
use App\Models\EducationBackground;
use App\Models\Language;
use App\Models\Skill;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'address',
        'phone_number',
        'personal_summary'
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

    public function careerHistory()
    {
        // ユーザーは複数の経歴を持つ
        return $this->hasMany(CareerHistory::class);
    }

    public function educationBackground()
    {
        // ユーザーは複数の学歴を持つ
        return $this->hasMany(EducationBackground::class);
    }

    public function language()
    {
        // ユーザーは複数の言語を持つ
        return $this->hasMany(Language::class);
    }

    public function licenceOrCertification()
    {
        // ユーザーは複数の免許や資格を持つ
        return $this->hasMany(LicenceOrCertification::class);
    }

    public function skill()
    {
        // ユーザーは複数のスキルを持つ
        return $this->hasMany(Skill::class);
    }

    // ユーザーは複数のお気に入りを持つ
    public function jobOffer(){
        return $this->hasMany(JobOffer::class);
    }

    // ユーザーは複数の求人情報をお気に入り登録できる
    public function savedJob(){
        return $this->hasMany(SavedJob::class);
    }

    // お気に入り登録がされているか
    public function isSavedJobOffer($jobOfferId)
    {
        return $this->savedJob()->where('job_offer_id', $jobOfferId)->exists();
    }
}
