<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationBackground extends Model
{
    use HasFactory;

    protected $fillable = [
        'institution',
        'major',
        'degree',
        'is_finished',
        'finished_year',
        'expected_year',
        'description',
    ];
}
