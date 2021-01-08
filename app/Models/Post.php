<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    // CONFIG

    protected $guarded = ['id'];
    protected $dates = ['published_at'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true
            ]
        ];
    }

    /**
     * Set the key value for binding model
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // RELATIONS
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

    public function images()
    {
        return $this->morphToMany(Image::class, 'imageable');
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
