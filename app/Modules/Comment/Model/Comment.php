<?php

namespace App\Modules\Comment\Model;

use App\Modules\Comment\Model\CommentLike\CommentLikes;
use App\Modules\Comment\Traits\LikeAble;
use App\Modules\User\Model\User;
use Database\Factories\CommentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Comment extends Model
{
    use LikeAble;

    protected $guarded = false;

    use HasFactory;

    protected static function newFactory()
    {
        return CommentFactory::new();
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getLikesCount(): int
    {
        return $this->likes()->count();
    }

    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'comment_likes')->withTimestamps();
    }
}
