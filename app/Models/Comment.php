<?php

namespace App\Models;

use App\Enum\CommentStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'post_id',
        'user_id',
        'email',
        'full_name',
        'comment',
        'status',
        'parent_id'
    ];

    protected function casts()
    {
        return [
            'status' => CommentStatusEnum::class,
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function parent()
    {
        return $this->belongsTo($this, 'parent_id');
    }

    public function answer()
    {
        return $this->hasMany($this, 'parent_id');
    }

    public function getCommentUserNameAttribute()
    {
        if (!is_null($this->user))
            return $this->user->full_name;

        return $this->full_name;
    }

    public function getCommentUserEmailAttribute()
    {
        if (!is_null($this->user))
            return $this->user->email;

        return $this->email;
    }

    public function getParentName()
    {
        if (is_null($this->parent_id))
            return 'نظر اصلی';

        return 'پاسخ نظر';
    }

    public function getStatusTitleAttribute()
    {
        return match ($this->status) {
            CommentStatusEnum::Pending => 'در انتظار',
            CommentStatusEnum::Approved => 'تائید شده',
            CommentStatusEnum::Rejected => 'رد شده',
        };
    }

    public function getStatusColorAttribute()
    {
        return match ($this->status) {
            CommentStatusEnum::Pending => 'secondary',
            CommentStatusEnum::Approved => 'success',
            CommentStatusEnum::Rejected => 'danger',
        };
    }

    public function getLastAnswerDateAttribute()
    {
        return $this->answer()
            ->orderByDesc('created_at')
            ->first()->created_at ?? '';
    }
}
