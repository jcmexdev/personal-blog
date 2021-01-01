<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('posts');
        Storage::makeDirectory('posts');

        Post::factory(40)->create()
            ->each(function ($post) {
                Image::factory(1)->create([
                    'imageable_id' => $post,
                    'imageable_type' => Post::class
                ]);
                $tags = Tag::all();
                $post->tags()->attach([
                    $tags->random()->id,
                    $tags->random()->id
                ]);
            });
    }
}
