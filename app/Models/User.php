<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_image',
        'animal_name',
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
        'password' => 'hashed',
    ];

      // UserとPostのリレーション
      public function posts()
      {
          return $this->hasMany(Post::class);
      }
  
      // UserとCommentのリレーション
      public function comments()
      {
          return $this->hasMany(Comment::class);
      }

       // フォローしているユーザーの一覧を取得
    public function following()
    {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'followed_id');
    }

    // フォロワーの一覧を取得
    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'follower_id');
    }

    // ユーザーをフォローする
    public function follow(User $user)
    {
        return $this->following()->syncWithoutDetaching([$user->id]);
    }

    // ユーザーのフォローを解除する
    public function unfollow(User $user)
    {
        return $this->following()->detach($user->id);
    }

    // 指定したユーザーをフォローしているかどうかを判定
    public function isFollowing(User $user)
    {
        return $this->following()->where('followed_id', $user->id)->exists();
    }

    public function isFollowingUserPosts()
{
    // フォローしているユーザーのポストを取得する条件
    $followingUserIds = $this->following()->pluck('users.id');
    $postUserIds = Post::pluck('user_id');

    return $followingUserIds->intersect($postUserIds)->isNotEmpty();
}
  
}
