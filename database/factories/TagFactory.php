<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->word(20);
        $slug = Str::slug($name);
        return [
            'name' => $name,
            'slug' => $slug,
            'color' => $this->faker->randomElement(['indigo', 'purple', 'pink', 'yellow', 'red', ' gray']),
        ];
    }
}
