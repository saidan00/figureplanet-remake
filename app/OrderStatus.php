<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
        // Table Name
        protected $table = 'order_statuses';
        // Primary Key
        public $primaryKey = 'id';
        // Timestamps
        public $timestamps = true;
}
