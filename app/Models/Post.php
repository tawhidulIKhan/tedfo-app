<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'photo_path', 'user_id', 'schedule_date'];

    protected $dates = ['schedule_date'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

}
