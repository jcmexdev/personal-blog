<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsToy(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    // SCOPES
    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at')->orderBy('published_at', 'desc');
    }

    public function scopeRelated($query, $post)
    {
        return $query->whereCategoryId($post->category->id)->whereNotIn('id', [$post->id])->take(4);
    }
}
