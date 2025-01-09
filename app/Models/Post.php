<?php

namespace App\Models;

use App\Enum\PostStatusEnum;
use Maize\Markable\Markable;
use Maize\Markable\Models\Like;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Maize\Markable\Models\Bookmark;

class Post extends Model
{
    use HasFactory, SoftDeletes, Markable;

    protected $fillable = [
        'title',
        'content',
        'user_id',
        'category_id',
        'tags',
        'status',
        'image',
    ];

    protected static $marks = [
        Like::class,
        Bookmark::class,
    ];

    protected function casts()
    {
        return [
            'status' => PostStatusEnum::class
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getStatusTitleAttribute()
    {
        return match ($this->status->value) {
            'published' => 'منشتر شده',
            'draft' => 'پیش نویس',
            'pending' => 'در انتظار',
        };
    }

    public function getStatusColorAttribute()
    {
        return match ($this->status->value) {
            'published' => 'success',
            'draft' => 'secondary',
            'pending' => 'warning',
        };
    }

    public function isLiked(): bool
    {
        if (!is_null(auth()->check()))
            return false;

        return Like::has($this, auth()->user());
    }

    public function isBookmarked(): bool
    {
        if (!is_null(auth()->check()))
            return false;

        return Bookmark::has($this, auth()->user());
    }
}
