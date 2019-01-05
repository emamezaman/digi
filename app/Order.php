<?php

namespace App;
use App\lib\JDF;
use Illuminate\Database\Eloquent\Model;
use Session;
use DB;
class Order extends Model
{
    protected  $fillable = ['address_id','user_id','time','date',
        'send_order_type','pay_type','pay_status',
        'order_status','total_price','price','code1',
        'code2','order_read','order_code'];
    protected $table = 'order';
    public $timestamps = false;
    public function get_user_address(){
        return $this->hasOne(UserAddress::class,'id','address_id')
            ->withDefault([
                'full_name'=>'-',
                'ostan_id'=>0,
                'shar_id'=>0,
                'mobile'=>'-',
                'phone'=>'-',
                'city_code'=>'-',
                'address'=>'-',
            ]);
    }

    public function add_order($pay_type,$refid=null){

    	$array = array();


         $order_info = Session::get('order_info');
    	  $address_id = array_key_exists('order_address', $order_info) ? $order_info['order_address'] : null;
    		$order_type = array_key_exists('order_type', $order_info) ? $order_info['order_type'] : null;
    		if($address_id){
    			$price = GiftCart::get_price();
    			$total_price = Session::get('total_price',0);
    			if($price && $total_price){
               $jdf = new JDF();
               $user_id = \Auth::user()->id;
               $this->user_id = $user_id;
               $this->time =time();
               $this->order_code =substr($this->time,2,3).$this->user_id.substr($this->time,5,5);
               $this->pay_type =$pay_type;
               $this->date =$jdf->tr_num($jdf->jdate('Y-n-j'));
               $this->order_status = 1;
               $this->pay_status = 0;
               $this->send_order_type = $order_type;
               $this->address_id = $address_id;
               $this->price = $price;
               $this->total_price = $total_price;
               $this->code1 = $refid;
               if($this->save()){
               	$cart = Session::get('cart');
               	$s_c = array();
               	$i=1;
               	foreach ($cart as $key => $value) {
                  foreach ($value as $key2 => $value2) {
                   $s_c = explode('_', $key2);
                   $row = DB::table('order_row')
                   ->insert([
                   'order_id' => $this->id,
                   'product_id' => $key,
                   'service_id' => $s_c[0],
                   'color_id' => $s_c[1],
                   'number'=>$value2
                   ]);
                   if(!$row){ $i = 0;}
                  }
               	}
                 if($i==0){
                  DB::table('order_row')
                  ->where('order_id',$this->id)
                  ->delete();
                  $this->delete();

                 }else{

                 	$array['id'] =$this->id;
                 }

               }else{$array['error']='خطا در ثبت اطلاعات ';}

    			}else{$array['error']='خطا در ثبت اطلاعات ';}

    		}else{ $array['error']='خطا در ثبت اطلاعات ';}


    	return $array;
    }

    /*  get all order row */
    public  function get_order_row(){
        return $this->hasMany(OrderRow::class,'order_id','id');
    }

    //get user
    public function get_user(){
       return  $this->hasOne(User::class,'id','user_id')->withDefault(['username'=>'-']);
    }


    public static function search($data){
         $jdf = new JDF();

          $string='';

           $orders = Order::orderBy('id','DESC');

       if(sizeof($data)>0){

           if(array_key_exists('order_code', $data)){
            if(!empty($data['order_code'])){
              $orders = $orders
              ->where('order_code','like','%'.$data['order_code'].'%');
            }
              $string = '?order_code='.$data['order_code'];
          }


         if(array_key_exists('from_date', $data)){
          if(!empty($data['from_date'])){
             $d =explode('/',$data['from_date']);
             $t =$jdf->jmktime(0,0,0,$d[1],$d[2],$d[0]);
             $orders = $orders->where('time','>=',$t);
          }
             $string .= '&from_date='.$data['from_date'];
          }

           if(array_key_exists('to_date', $data)){
          if(!empty($data['to_date'])){
             $d =explode('/',$data['to_date']);
             $t =$jdf->jmktime(23,59,59,$d[1],$d[2],$d[0]);
             $orders = $orders->where('time','<=',$t);
          }
             $string .= '&to_date='.$data['to_date'];
          }
       }


       return $orders->paginate(10)->withPath($string);
    }

  public static function get_price(){
    $price = Session::get('price',0);

      $r = Session::get('discount',0);

      if($r){
        $price = intval($price - (($r*$price)/100));
      }

    return $price;
  }
}
