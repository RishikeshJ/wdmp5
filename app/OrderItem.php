<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';

    public function get_product(){
        return $this->belongsTo('App\Product', 'product');
    }

    public function get_order(){
        return $this->belongsTo('App\Order', 'order');
    }
}
