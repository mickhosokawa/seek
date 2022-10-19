<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\primaryCategory;
class Job extends Model
{
    use HasFactory;

    public function sort($select)
    {
        if($select == 'relevance'){
            return $this->orderBy('id', 'desc');
        }else{
            return $this->orderBy('created_at', 'desc');
        }
    }

    public function category()
    {
        return $this->belongsTo(primaryCategory::class);
    }
}
