<?php

namespace Database\Seeders;

use App\Modules\Blog\Model\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blog::factory(5)->create();
    }
}
