<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function get_category(){
        return $this->belongsTo('App\ProductCategory', 'category');
    }
}
