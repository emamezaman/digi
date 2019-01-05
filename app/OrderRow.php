<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderRow extends Model
{
     protected  $fillable = ['order_id','product_id','color_id','service_id','number'];
    protected $table = 'order_row';
    public $timestamps = false;
    public function get_product(){
       return  $this->hasOne(Product::class,'id','product_id');
    }

    public function get_color(){
       return  $this->hasOne(Color::class,'id','color_id');
    }
    public function get_service(){
       return $this->hasOne(Service::class,'id','service_id');
    }

}

