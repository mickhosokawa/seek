<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'role',
        'job_title',
        'company_name',
        'started_year',
        'started_month',
        'ended_year',
        'ended_month',
        'description',
    ];

    
}
