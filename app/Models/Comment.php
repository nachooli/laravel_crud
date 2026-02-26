<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Model para Coment
 */
class Comment extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'post_id',
        'user_id',
        'content',
        'datetime',
    ];

    protected $casts = [
        'datetime' => 'datetime',
    ];

    /**
     * Relación con Post
     *
     * @return BelongsTo
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Relación con User
     *
     * @return BelongsTo
     */
    public function writer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
