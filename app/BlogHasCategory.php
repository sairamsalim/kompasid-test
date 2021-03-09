<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Blog;
use App\Category;

class BlogHasCategory extends Model
{
    protected $primaryKey = null;
    public $incrementing = false;
    protected $fillable = [
    	'blog_id', 'category_id'
    ];
    public function blog()
    {
    	return $this->belongsTo(Blog::class, 'id', 'blog_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'id', 'category_id');
    }
}
