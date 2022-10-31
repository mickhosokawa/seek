<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HumanResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Company extends Authenticatable
{
    use HasFactory;

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

    // 企業情報登録
    public function createCompanyInfo($name, $email, $password){

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
