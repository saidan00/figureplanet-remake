<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;

class MediaFileUsage extends Model
{
    // Table Name
    protected $table = 'media_file_usages';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    // public function file()
    // {
    //     return $this->hasOne('App\MediaFile', 'id', 'media_file_id');
    // }
}
