<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class primaryCategory extends Model
{
    use HasFactory;

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function getLists()
    {
        $categories = primaryCategory::pluck('name', 'id');
        return $categories;
    }
}
