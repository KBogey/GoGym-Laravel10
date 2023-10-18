<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content'
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Post::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(\app\Models\User::class);
    }
}
