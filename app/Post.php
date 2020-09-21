<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    protected $fillable = ['user_id', 'title', 'post_image', 'body', 'category_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getPostImageAttribute($value)
    {
        return asset('storage/' . $value);
    }
}
