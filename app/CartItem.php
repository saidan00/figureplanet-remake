<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    // Table Name
    protected $table = 'cart_items';
    // Primary Key
    public $primaryKey = ['cart_id', 'product_id'];
    public $incrementing = false;
    // Timestamps
    public $timestamps = true;

    public function product()
    {
        return $this->hasOne('App\Product', 'id', 'product_id');
    }

    public function getTotalAttribute()
    {
        return $this->product->price * $this->quantity;
    }
}
