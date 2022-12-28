<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TradingHistory extends Model
{
    protected $fillable = ['trading_date', 'code', 'number', 'buy_price', 'sell_price', 'profit', 'number_t', 'note'];
}
