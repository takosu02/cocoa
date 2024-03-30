<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    //userに対するリレーション
    //一対多
    public function user()
    {
        return $this->belongsTO(user::class);
    }
}
