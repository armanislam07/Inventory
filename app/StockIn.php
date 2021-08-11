<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockIn extends Model
{
    protected $fillable = ['product','vendor','quantity','current_quantity','buy_price',
    					'sell_price','total_sell_amount','chalan_date','notes'];
}
