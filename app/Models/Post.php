<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this::with('categories')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    protected $fillable = [
        'title',
        'body',
        'image_url',
        'user_id',
        'top',
        'jacket',
        'pant',
        'other',
        'category_id'
    ];
    

    //categoryに対するリレーション
    //多対多
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    
    //userに対するリレーション
    //一対多
    public function user()
    {
        return $this->belongsTo(user::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function mypages()
    {
        return $this->belongsTo(Mypage::class);
    }
}
