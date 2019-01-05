<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Item extends Model
{
    protected  $fillable = ['name','category_id','parent_id','filed'];
    protected $table = 'items';
    public $timestamps = false;

    public function childs(){
    	return $this->hasMany(Item::class,'parent_id','id');
    }
    public static function get_items($id){
    	$cats = DB::table('category_product')->where('product_id',$id)->get();
            $items = array();
            foreach($cats as $key=>$value){
              $item= Item::with(['childs','get_value_item'])->where(['category_id'=>$value->category_id,'parent_id'=>0])->get();
             if(count($items)==0){
                if(count($item)>0){$items = $item;}
             }
            }
    return $items;
    }
// =============================
    public function get_value_item(){
    	return $this->hasOne(ItemProduct::class,'item_id','id');
    }

    public static function check_item_product($data){
        foreach ($data as $key => $value) {
            
         $product = Product::with('get_cats')

          ->where(['id'=>$value,'show_product'=>1])->first();
          
          if($product){
             $cats =  $product->get_cats;
               $id = self::get_first_item($cats);
              print_r($id);
             
          }
        }
    }

     public static function get_first_item($cats){

    $item_id = 0;

    foreach($cats as $key=>$value){

           

              $item = Item::where(['category_id'=>$value->category_id,'parent_id'=>0])->first();
                if($item){
                    $item_id = $item->id;
                    break;
                }
              
            }
    return $item_id;
     }

}
             
                 
           


      
