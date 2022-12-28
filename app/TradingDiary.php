<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TradingDiary extends Model
{
    protected $fillable = ['trading_date', 'content', 'tags'];
}
