<?php

namespace App\Models;

use App\Models\Company\AwardsAndAccreditations;
use App\Models\Company\Benefits;
use App\Models\Company\CultureAndValues;
use App\Models\Company\Images;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HumanResource;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Company extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

    protected $softCascade = ['humanResource'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    public function humanResource(){
        return $this->hasOne(HumanResource::class);
    }

    // 1つのCompanyは複数のJobOfferを持つ
    public function jobOffer(){
        return $this->hasMany(JobOffer::class);
    }

    // 受賞歴
    public function awardsAndAccreditation(){
        return $this->hasMany(AwardsAndAccreditations::class);
    }

    // 福利厚生
    public function benefit(){
        $this->hasMany(Benefits::class);
    }

    // 文化と価値
    public function cultureAndValue(){
        $this->hasMany(CultureAndValues::class);
    }

    // 画像
    public function image(){
        return $this->hasMany(Images::class);
    }

    // 企業情報登録
    public function createCompanyInfo($name, $email, $password)
    {
        try{
            DB::beginTransaction();

            $result = Company::create([
                    'name' => $name,
                    'email' => $email,
                    'password' => Hash::make($password),
                ]);
            
            DB::commit();
            //dd($result);
            return $result;

        }catch(Exception $e){
            DB::rollBack();
        }
    }
}
