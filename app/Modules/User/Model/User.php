<?php

namespace App\Modules\User\Model;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Modules\Blog\Model\Blog;
use App\Modules\User\Traits\Followable;
use App\Modules\User\Traits\HasRole;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Followable, HasRole;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password', 'surname', 'nickname', 'avatar', 'banner'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function newFactory()
    {
        return UserFactory::new();
    }

    public function blog(): HasMany
    {
        return $this->hasMany(Blog::class);
    }

    public function hasAvatar(): bool
    {
        if ($this->avatar) {
            return true;
        }
        return false;
    }

    public function hasBanner(): bool
    {
        if ($this->banner) {
            return true;
        }
        return false;
    }

    public function getAvatar(): string
    {
        return 'https://www.gravatar.com/avatar/' . md5($this->email) . 'fs=200';
    }

    public function getIdentifier(): string
    {
        if ($this->nickname) {
            return $this->nickname;
        } else {
            return $this->name . ' ' . $this->surname;
        }
    }

    public function getFullName(): string
    {
        return $this->name . ' ' . $this->surname;
    }

    public function isEqual(User $user): bool
    {
        return $this->id === $user->id;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    public function isRoleEqual(string $role): bool
    {
        return $this->role == $role;
    }
}
