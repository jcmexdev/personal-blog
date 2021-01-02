<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    use Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true
            ]
        ];
    }

    protected $guarded = ['id'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
