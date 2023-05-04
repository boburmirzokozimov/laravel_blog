<?php

namespace Database\Seeders;

use App\Modules\Comment\Model\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comment::factory(80)->create();
    }
}
