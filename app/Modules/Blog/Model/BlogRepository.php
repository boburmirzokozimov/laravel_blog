<?php

namespace App\Modules\Blog\Model;

use Illuminate\Support\Collection;

class BlogRepository
{
    public function getBlogs(): Collection
    {
        return Blog::all();
    }

    public function getBlogsOfUser(int $userId): Collection
    {
        return Blog::all()
            ->where('owner_id', $userId);
    }

    public function getBlog(int $id): Blog
    {
        return Blog::find($id);
    }

    public function existsByName(string $name): bool
    {
        return Blog::where('name', $name)->count() > 0;
    }

    public function remove(int $id): void
    {
        Blog::destroy($id);
    }

}
