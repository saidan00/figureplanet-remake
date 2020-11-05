<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Order
 * @package App
 */
class Order extends Model
{
    // Table name
    protected $table = 'orders';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function order_details()
    {
        return $this->hasMany('App\OrderDetail', 'order_id', 'id');
    }

    public function order_status() {
        return $this->hasOne('App\OrderStatus', 'id', 'order_status_id');
    }

    public function payment_method() {
        return $this->hasOne('App\PaymentMethod', 'id', 'payment_method_id');
    }

    public function getItemsCountAttribute() {
        return count($this->order_details);
    }
}
