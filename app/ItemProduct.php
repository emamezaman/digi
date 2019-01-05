<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemProduct extends Model
{
     protected  $fillable = ['product_id','item_id','value'];
    protected $table = 'item_product';
    public $timestamps = false;
}
