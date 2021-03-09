<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BlogHasCategory;

class Blog extends Model
{
    protected $fillable =[
    	'id', 'title', 'slug', 'content', 'image', 'user_id'
    ];
    public function categories()
    {
        return $this->hasMany(BlogHasCategory::class, 'blog_id', 'id');
    }
    public static function boot() {
        parent::boot();
        static::deleting(function($blog) {
             $blog->categories()->delete();
        });
    }
}
