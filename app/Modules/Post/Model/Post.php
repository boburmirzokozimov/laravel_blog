<?php

namespace App\Modules\Post\Model;

use App\Modules\Blog\Model\Blog;
use App\Modules\Comment\Model\Comment;
use App\Modules\Post\Model\PostLike\PostLike;
use App\Modules\User\Model\User;
use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    protected $guarded = false;

    use HasFactory;

    protected static function newFactory()
    {
        return PostFactory::new();
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function is_author(User $author): bool
    {
        return $this->author_id == $author->id;
    }

    public function getCover()
    {
        return $this->content_photo;
    }

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(PostLike::class);
    }

}
