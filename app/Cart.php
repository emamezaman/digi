<?php
namespace App;
use Session;
use App\Color;
class Cart {
	public static function addCart($product_id,$service_id,$color_id)
	{

		    Session::forget(['discount','order_data']);
        $cart = Session::get('cart',array());


         $s_c = $service_id.'_'.$color_id;

       if(array_key_exists($product_id, $cart))
       {

       	if(array_key_exists($s_c,$cart[$product_id])){
             $cart[$product_id][$s_c]++;
       	}else{
       		$cart[$product_id][$s_c] = 1;
       	}

       }else{
          $cart[$product_id][$s_c] = 1;
       }
        Session::put('cart',$cart);



	}

	public static function get(){

		$cart = Session::get('cart',array());
      ksort($cart); //اندیس های آرایه را به صورت صعودی مرتب می نماید
		 return $cart;


	}

	public static function getData($p_id,$s_id,$c_id)
	{
		$data = array();
		$product = Product::find($p_id);
		if($product){
           $data['title'] = $product->title;
           $data['title_url'] = $product->title_url;
           $data['code'] = $product->code;
           $data['code_url'] = $product->code_url;
           $img = $product->get_image->url;
           $data['img'] = $img ? $img : '' ;

            $color = Color::find($c_id);
           if($color){
           $data['color_name'] = $color->title;
           $data['color_code'] = $color->code;

           }else{
	           $data['color_name'] = '';
	           $data['color_code'] = '';
           }
           $service = Service::find($s_id);
           if($service){
             $data['service_name'] = $service->service_name;
           }else{
            $data['service_name'] = '';
           }
           $service_data = Service::where(['parent_id'=>$s_id,'color_id'=>$c_id])->first();
           $discounts = $product->discounts ? $product->discounts : 0;
           if($service_data){
           	$data['discounts_price'] = $service_data->price - $discounts ;
           }else{
              $data['discounts_price'] = $product->price - $product->discounts ;
           }

            $data['price'] = $product->price;
        // dd($data);
          return $data;

		}else{
			return false;
		}
	}


public static function delProduct($product_id,$service_id,$color_id){
Session::forget(['discount','order_data']);
  $cart = Session::get('cart');
  $s_c = $service_id.'_'.$color_id;

  if(array_key_exists($product_id, $cart)){
    if(array_key_exists($s_c, $cart[$product_id])){
      unset($cart[$product_id][$s_c]);
      if(empty($cart[$product_id])){
        unset($cart[$product_id]);
      }
    }
  }
  if(empty($cart))
  {
    Session::forget('cart');
  }else{

   Session::put('cart',$cart);
  }
}

public static function setProduct($product_id,$service_id,$color_id,$value){
Session::forget(['discount','order_data']);
 $product = Product::find($product_id);
  $cart = Session::get('cart');
  $s_c = $service_id.'_'.$color_id;

  if($value <= $product->product_number){
    if(array_key_exists($product_id, $cart)){
    if(array_key_exists($s_c, $cart[$product_id])){

       $value = intval($value);
       if(is_int($value) && $value >= 1)
       {
          $cart[$product_id][$s_c]= $value;

       }



    }
  }
  }
   Session::put('cart',$cart);

}

// count product cart
public static function count(){

   $cart = Session::get('cart',array());
   $count =0;

  foreach ($cart as $key => $value) {
     foreach ($value as $key2 => $value2) {

      $count+=$value2;

     }
  }

       return $count;
}

//

public static  function has(){
$cart = Session::get('cart',array());
if(sizeof($cart)==0){
  return false;
}else{
  return true;
}

}







}
