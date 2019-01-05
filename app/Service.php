<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
      protected  $fillable = ['service_name','product_id','parent_id','color_id','date','time'];
    protected $table = 'service';
    public $timestamps = false;

    public function product(){
    	return $this->hasOne(Product::class,'id','product_id');
    }
    
     public function get_service(){
    	return $this->hasMany(Service::class,'parent_id','id');
    }
    
    //================
     public function get_color(){
    	return $this->hasOne(Color::class,'id','color_id');
    }
}
