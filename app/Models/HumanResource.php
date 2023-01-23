<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class HumanResource extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_id',
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

    public function company(){
        return $this->belongsTo(Company::class);
    }

    // 企業ユーザー情報登録
    public function createHrInfo($companies_id, $email, $password){

        try{
            DB::beginTransaction();
    
            $result = HumanResource::create([
                    'company_id' => $companies_id,
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
