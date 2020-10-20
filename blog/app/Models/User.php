<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * @package App\Models
 */
class User extends Model
{
    use Notifiable;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = "users";

    /**
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'is_admin'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class,'user_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class,'user_id','id');
    }
}

