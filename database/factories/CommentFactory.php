<?php

namespace Database\Factories;

use App\Modules\Comment\Model\Comment;
use App\Modules\Post\Model\Post;
use App\Modules\User\Model\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'author_id' => User::all()->random()->id,
            'post_id' => Post::all()->random()->id,
            'comment' => fake()->realText(),
        ];
    }
}
