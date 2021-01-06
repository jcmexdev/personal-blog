<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->unique()->sentence(5);
        $path = 'public/storage/posts';
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'cover' => "posts/{$this->faker->image($path, 640, 480, null, false)}",
            'extract' => $this->faker->text(160),
            'body' => $this->faker->text(2000),
            'published_at' => $this->faker->dateTime(),
            'category_id' => Category::all()->random()->id,
            'user_id' => User::all()->random()->id,
        ];
    }
}
