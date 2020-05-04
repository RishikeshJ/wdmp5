<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    
    public function order_items(){
        return $this->hasMany("App\OrderItem", "order");
    }

    public function get_user(){
        return $this->belongsTo("App\User", "user");
    }

    public function updatePrice(){
        $order_items = $this->order_items;
        foreach ($order_items as $item) {
            $item->price = number_format($item->get_product->price * $item->quantity, 2);
            $item->save();
        }

        $this->price = $this->order_items->sum('price');
        $this->tax = number_format($this->price * 0.08, 2);
        $this->final_price = number_format($this->price + $this->tax - $this->discount, 2);
        $this->save();
    }

    public function get_active_final_price(){
        $price = $this->order_items->sum('price');
        $tax = number_format($price * 0.08, 2);
        return number_format($price + $this->tax - $this->discount, 2);
    }
}
