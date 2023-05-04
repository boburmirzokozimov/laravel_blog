<?php

namespace Database\Factories;

use App\Modules\Blog\Model\Blog;
use App\Modules\User\Model\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->unique()->safeEmail(),
            'image' => fake()->image('public/storage/blog', fullPath: false),
            'owner_id' => User::all()->random()->id
        ];
    }
}
