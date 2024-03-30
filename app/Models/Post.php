<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this::with('categories')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    protected $fillable = [
        'title',
        'body',
        'image_url',
        'user_id'
    ];

    //categoryに対するリレーション
    //多対多
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    
    //userに対するリレーション
    //一対多
    public function user()
    {
        return $this->belongsTO(user::class);
    }
}
