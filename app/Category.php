<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BlogHasCategory;

class Category extends Model
{
    protected $fillable = [
        'id', 'title'
    ];
    public function blogs()
    {
        return $this->hasMany(BlogHasCategory::class, 'category_id', 'id');
    }
    public static function boot() {
        parent::boot();
        static::deleting(function($blog) {
             $blog->blogs()->delete();
        });
    }
}
