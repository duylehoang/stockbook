<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Blog;

class Category extends Model
{
    protected $fillable = ['name', 'status', 'sort_order'];
    
    public function scopeValid($query)
    {
        return $query->where('status', 1);
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'category_id', 'id');
    }
}
