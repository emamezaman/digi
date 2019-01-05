<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilterProduct extends Model
{
    protected  $fillable = ['product_id','filter_id','value'];
    protected $table = 'filter_product';
    public $timestamps = false;
}
