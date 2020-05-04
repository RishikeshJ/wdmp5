<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';

    public function get_product(){
        return $this->belongsTo('App\Product', 'product');
    }
}
