<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable
    = [
        'name',
        'description',
        'parent_id',
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class);
    }

    public function childred()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    //Extra methods
    //    public function parentName(){
    //        return is_null($this->parent_id) ? 'دسته بندی اصلی' : $this->parent->name;
    //    }

    public function getParentNameAttribute()
    {
        return is_null($this->parent_id) ? 'دسته بندی اصلی' : $this->parent->name;
    }
}
