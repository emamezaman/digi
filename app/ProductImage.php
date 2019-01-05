<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = ['id','url' , 'product_id'];
    protected $table = 'product_image';
   
     public function product(){
     	return $this->hasOne(Product::class);
     }
   
}

 
 

