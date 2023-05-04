<?php

namespace Database\Factories;

use App\Modules\Blog\Model\Blog;
use App\Modules\Post\Model\Post;
use App\Modules\User\Model\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'slug' => Str::slug(fake()->title),
            'content' => fake()->realText(),
            'content_photo' => fake()->image('public/storage/post', fullPath: false),
            'author_id' => User::all()->random()->id,
            'blog_id' => Blog::all()->random()->id
        ];
    }
}
