<?php

namespace App\Models;

use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Post extends Model
{
    protected $fillable = ['title', 'content', 'slug', 'cover_image', 'category_id'];

    public static function generateSlug($title)
    {
        return Str::slug($title, '-');
    }

    public function category(): BeLongsTo
    {
        return $this->belongsTo(Category::class);
    }
}

// $post->category // App/Models/Category
// $post->category->name // Ops