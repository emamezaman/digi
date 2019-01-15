<?php
 https://faradars.org/my-account/downloads?order=935921
namespace App;

use Illuminate\Database\Eloquent\Model;

class Amazing extends Model
{
   protected $fillable =['m_title','title','tozihat','price1','price2','product_id','time','timestamp'];
    protected $table = 'amazing';
    public $timestamps = false;

    public function get_product(){
    	return $this->hasOne(Product::class,'id','product_id');
      

    }

     public function get_img(){

         return $this->hasOne(ProductImage::class,'product_id','product_id');
    }



}
