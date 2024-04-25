<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mypage extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'body',
        'age',
        'height',
        'image_url',
        'user_id',
        'post_id',
    ];
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
