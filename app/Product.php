<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    // Table Name
    protected $table = 'products';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function images()
    {
        return $this->hasManyThrough('App\MediaFile', 'App\MediaFileUsage', 'usage_id', 'id', 'id', 'media_file_id')
            ->where('usage_table', $this->table);
    }

    public function order_details()
    {
        return $this->hasMany('App\OrderDetail', 'product_id', 'id');
    }
}
