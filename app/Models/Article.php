<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'excerpt', 'content', 'image','user_id'];

    public function topics(){
        return $this->belongsToMany(Topic::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function imagePath(){
        if(filter_var($this->image, FILTER_VALIDATE_URL)){
            return $this->image;
        }

        if(!file_exists( public_path('img/articles/') . $this->image)) {
            return '/img/nophoto.jpg';
        }

        return '/img/articles/' . $this->image;
        // return public_path('img/posts/') . $this->image;
    }
}
