<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'comment',
        'post_id',
        'user_id',
    ];
    
    //userに対するリレーション
    //一対多
    public function user()
    {
        return $this->belongsTO(user::class);
    }
    
    public function post()
    {
        return $this->belongsTO(post::class);
    }
}