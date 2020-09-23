<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use SoftDeletes;
    // Table Name
    protected $table = 'products';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function files()
    {
        return $this->hasManyThrough('App\MediaFile', 'App\MediaFileUsage', 'usage_id', 'id', 'id', 'media_file_id');
    }
}
