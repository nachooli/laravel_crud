<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Modelo de User
 */
class User extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'username',
        'full_name',
    ];

    /**
     * Relación con Posts
     *
     * @return HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Relación con Comments
     *
     * @return HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Relación con Categories (Categorias en las que ha intervenido un User)
     *
     * @return BelongsToMany
     */
    public function userCategories(): BelongsToMany
    {
        return $this->belongsToMany(
            Category::class,
            'category_post',
            'post_id',
            'category_id'
        )->distinct();
    }
}
