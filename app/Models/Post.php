<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Psy\Util\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
      'title',
      'content'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getSlug(): string
    {
        return \Illuminate\Support\Str::slug($this->title);
    }
}
