<?php

namespace App\Modules\Blog\Model;

use App\Modules\Post\Model\Post;
use App\Modules\User\Model\User;
use Database\Factories\BlogFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin Builder
 */
class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'name',
        'description',
        'image'
    ];

    protected static function newFactory()
    {
        return BlogFactory::new();
    }

    public function getBanner(string $value)
    {
        return asset($value);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function isOwner(User $user): bool
    {
        return $this->owner_id = $user->id;
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function followers(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
