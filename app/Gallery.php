<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'type', 'status', 'sort_order'];

    public function scopeValid($query)
    {
        return $query->where('status', 1);
    }

}
