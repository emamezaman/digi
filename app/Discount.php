<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = ['id','code' , 'value','time','time_code','price'];
    protected $table = 'discount';
    public $timestamps = false;
    public static function check_discount($data,$price){


        if(self::check_time($data)){
         $v = self::check_price($data,$price);
          if($v){
          return $v;
        }else{return false;}

        }else{return false;}

    }
    public static function check_time($data){
       if($data[0]->time > 0){ //اگر زمانش بزرگتر از 0 بود به معنی این است که زماندار است و براش زمان تعیین کردن
         if($data[0]->time>time()){ // بعد باید معتبر بودن زمانشو بررسی کنیم
           return true;
         }else{return false;}
       }else{return true;}//اگر بدون زمان بود بدین معنی است که براش زمان تعیین نکردن و همچنان معتبر هست
    }

      public static function check_price($data,$price){

        $s=0;
        foreach ($data as $key => $value) {
         if($value->price==0){
           if($s !=0){
              $s =  $value->value;
           }

         }
         if($price>$value->price){
           $s = $value->value;
         }

        }
      return $s;
      }

       public static function get_price(){
      $price = Session::get('price',0);
      $c = Session::get('discount',0);
      $price2=intval($price-(($c * $price)/100));
      return $price2;
    }
}
