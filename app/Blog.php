<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Blog extends Model
{
    protected $fillable = ['title', 'slug', 'subtitle', 'content', 'status', 'background', 'category_id', 'view', 'sort_order'];
    protected $dates = ['created_at', 'updated_at'];
    
    public function scopeValid($query)
    {
        return $query->where('status', 1);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
