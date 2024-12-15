<?php

namespace App\Models;

use App\Enum\PostStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'user_id',
        'category_id',
        'tags',
        'status',
        'image',
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
}
