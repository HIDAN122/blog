<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App\Models
 */
class Category extends Model
{
    /**
     * @var string
     */
    protected $table = "categories";

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'slug',
        'parent_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class,'category_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function childs()
    {
        return $this->hasMany(static::class, 'parent_id', 'id');
    }

    /**
     * @return bool
     */
    public function isParent()
    {
        return !!$this->childs()->count();
    }
}
