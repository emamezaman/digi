<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
class GiftCart extends Model
{
    protected $fillable = ['id','code' , 'value','time','status','user_id','date'];
    protected $table = 'gift_cart';
    public $timestamps = false;

    public function get_user(){
      $user = $this->hasOne(User::class,'id','user_id')->withDefault(['username'=>'حذف شده']);
      return $user;
    }

    public static function get_price(){
    	$price = Session::get('price',0);
    	$c = Session::get('discount',0);
    	$price2=intval($price-(($c * $price)/100));
		  
    	$gift_list=Session::get('gift_list',[]);
    	foreach ($gift_list as $key => $value) {
    		$price2 = $price2-$value;
    	}
    	  
    	return $price2;
    }

    public static function remove_gift_cart(){
    $gift_list=Session::get('gift_list',[]);
    	foreach ($gift_list as $key => $value) {
    		DB::table('gift_cart')->where('code',$key)->update(['status'=>1]);
    	}
    	Session::forget('gift_list');
    }
    
}
