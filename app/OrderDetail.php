<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use SoftDeletes;
    // Table name
    protected $table = 'order_details';
    // Primary Key
    public $primaryKey = ['order_id', 'product_id'];
    public $incrementing = false;
    // Timestamps
    public $timestamps = true;

    public function order() {
        return $this->belongsTo('App\Order', 'id', 'order_id');
    }

    public function product() {
        return $this->hasOne('App\Product', 'id', 'product_id');
    }
}
