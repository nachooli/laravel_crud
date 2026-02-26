<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
