<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    // Table Name
    protected $table = 'carts';
    // Primary Key
    public $primaryKey = ['id'];
    public $incrementing = false;
    // Timestamps
    public $timestamps = true;

    protected $shipping_fee = 40000; // shipping = 40,000 VND

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function cart_items()
    {
        return $this->hasMany('App\CartItem', 'cart_id', 'id');
    }

    public function getSubtotalAttribute()
    {
        $subtotal = 0;
        foreach ($this->cart_items as $item) {
            $subtotal += $item->total;
        }
        return $subtotal;
    }

    public function getShippingFeeAttribute()
    {
        return $this->shipping_fee;
    }

    public function getTotalAttribute()
    {
        return $this->subtotal + $this->shipping_fee;
    }
}
