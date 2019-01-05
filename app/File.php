<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['id','url' , 'product_id','type'];
    protected $table = 'file';
    public $timestamps = false;
}
