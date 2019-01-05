<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class CatProduct extends Model
{
    protected  $fillable = [ 'category_id','product_id' ];

    protected $table = 'category_product';

    public $timestamps = false;

    public function get_product(){
        return $this->hasOne(Product::class,'id','product_id')->withDefault(['price'=>0]);
    }

}

