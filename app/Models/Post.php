<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Modelo para Pôst
 */
class Post extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'picture',
        'short_content',
        'content',
        'added',
        'comment',
        'pending',
        'public',
        'active',
    ];

    protected $casts = [
        'added'   => 'datetime',
        'comment' => 'boolean',
        'active'  => 'boolean',
        'pending' => 'boolean',
        'public'  => 'boolean',
    ];

    /**
     * Relación con Categories
     *
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
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
     * Relación con User
     *
     * @return BelongsTo
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Scope para los Posts publicados en caso de ser necesario
     *
     * @param $query
     * @return mixed
     */
    public function scopePublished($query)
    {
        return $query->where('public', true)
            ->where('active', true)
            ->where('pending', false);
    }
}
