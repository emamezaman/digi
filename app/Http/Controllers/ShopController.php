<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ostan;
use App\UserAddress;
use App\Shar;
use Validator;
use App\Cart;
use Session;
use App\Order;
use Auth;
use Response;
use App\lib\Barcode;
use App\lib\Mellat_Bank;
use App\lib\zarinpal;
use PDF;
use App\Discount;
use App\GiftCart;
class ShopController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('create_barcode');
    }
    public function shipping(){

                $bool =Cart::has();
                if($bool){
                $ostans = Ostan::get();
                $address = UserAddress::with(['get_ostan','get_shar'])->where('user_id',\Auth::user()->id)->orderBy('id','DESC')->paginate(10);
                return view('shop.shipping',array('ostans'=>$ostans,'address'=>$address));
                }else{
                return redirect('cart');
                }

    }

//===============================
public function getShar(Request $request){
	$id = $request->ostan_id ;
	if($request->ajax()){
	    $shars =Shar::select('shar_name','id')->where('ostan_id',$id)->get();
        return $shars ;
	}


}

    //================
public function add_address(Request $request){
   if($request->ajax()){
            $validator = Validator::make($request->all(),
                                     [
                                         'full_name'=>'required',
                                         'ostan_id'=>'required',
                                         'shar_id'=>'required',
                                         'phone'=>'required',
                                         'city_code'=>'required',
                                         'mobile'=>'required',
                                         'zip_code'=>'required',
                                         'address'=>'required',
                                     ],[],[
                                         'full_name'=>' نام و نام خانوادگی ',
                                         'ostan_id'=>'نام استان',
                                         'shar_id'=>'نام شهر',
                                         'phone'=>'تلفن ثابت',
                                         'city_code'=>'کد تلفن',
                                         'mobile'=>'شماره موبایل',
                                         'zip_code'=>'کد پستی',
                                         'address'=>'آدرس',
                                         ]);
        if($validator->fails()){

      return  $validator->messages();
            //return redirect()->back()->withErrors($validator)->withInput();
//      print_r($request->all());

        }else{
            $address = new UserAddress($request->all());
            $address->user_id = \Auth::user()->id;
            if($address->save()){
            return 'ok';
            }else{
                return 'error';
            }

        }
   }else{
       return redirect('/');
   }

    }

    //======================
    public function edit_address_form(Request $request){
         $address_id = $request->address_id;
         $address = UserAddress::findOrFail($address_id);
         $ostans = Ostan::get();
          $citys = Shar::where('ostan_id',$address->ostan_id)->get();
         if($address){
            return view('include.edit_address',
                array('address'=>$address,'ostans'=>$ostans,'citys'=>$citys));
         }
         return 'error';
    }

    public function update_address(Request $request,$id){
          if($request->ajax()){
            $validator = Validator::make($request->all(),
                                     [
                                         'full_name'=>'required',
                                         'ostan_id'=>'required',
                                         'shar_id'=>'required',
                                         'phone'=>'required',
                                         'city_code'=>'required',
                                         'mobile'=>'required',
                                         'zip_code'=>'required',
                                         'address'=>'required',
                                     ],[],[
                                         'full_name'=>' نام و نام خانوادگی ',
                                         'ostan_id'=>'نام استان',
                                         'shar_id'=>'نام شهر',
                                         'phone'=>'تلفن ثابت',
                                         'city_code'=>'کد تلفن',
                                         'mobile'=>'شماره موبایل',
                                         'zip_code'=>'کد پستی',
                                         'address'=>'آدرس',
                                         ]);
        if($validator->fails()){

      return  $validator->messages();
            //return redirect()->back()->withErrors($validator)->withInput();
//      print_r($request->all());

        }else{
            $address = UserAddress::findOrFail($id);

            if($address->update($request->all())){
                // show ajax data
           // $address = UserAddress::with(['get_ostan','get_shar'])->where('user_id',\Auth::user()->id)->orderBy('id','DESC')->paginate(10);
           //      return view('include.user_address_list',array('address'=>$address));
                return 'ok';
            }else{
                return 'error';
            }

        }
   }else{
       return redirect('/');
   }
    }


    // delete address function

    public function delete_address(Request $request,$id){

        $address = UserAddress::findOrFail($id);
          if( $address->delete()){
            return redirect()->back();

          }
    }


    //====================save order info =====================
    public function review(Request $request){
         if(Cart::has()){

       if($request->isMethod('post'))
       {
        $order_address=$request->order_address;
         $order_type=$request->order_type;
         $order_info =array();
         $address = UserAddress::find($order_address);
         if($order_address && $order_type){

            if($address){

                if($order_type==1 || $order_type==2){
                    $order_info= array();
                    $order_info['order_type'] = $order_type;
                    $order_info['order_address'] = $order_address;
                    Session::put('order_info',$order_info);
                    //dd($address);
                    return view('shop/review',compact('address'));
                }else{
                    return redirect('shipping');
                }

            }else{
                return redirect('shipping');
            }

         }else{
            return redirect('shipping')->with('message','لطفا آدرس ارسال سفارش را وارد نمائید.');
         }
       }else{
       if(Session::has('order_info')){
        $order_info = Session::get('order_info',array());
          $address_id = array_key_exists('order_address',$order_info) ? $order_info['order_address']  : 0;
            $address= UserAddress::find($address_id);
            if($address){

                 return view('shop/review',compact('address'));
            } else{
                 return redirect('shipping');
            }
       }else{
          return redirect('shipping');
       }
       }
         }else{
            return redirect('cart');
         }

    }//end function


    //===============================payment ==========================
    public function payment(){

        if(Cart::has('cart')){
           if(Session::has('order_info')){
             // Session::forget('discount');//حذف سشن کد تخفیف قبلی
               return view('shop.payment');
           }else{
             return redirect('shippin');
           }
        }else{
           return redirect('cart');
        }

    }

    public function pay(Request $request){
     if(Cart::has('cart')){
        if(Session::has('order_info')){

            $pay_type = $request->pay_radio;
        settype($pay_type, 'integer');
        if(is_integer($pay_type)){
            if($pay_type==2 || $pay_type==3 || $pay_type==4){
              $price = GiftCart::get_price();
                //--------------------- begin mellat bank
              if($pay_type==3){
                require_once('../app/lib/nusoap.php');
                $mellat_bank= new Mellat_Bank();
                    $refid = $mellat_bank->pay($price);
                   if($refid){
                     $order = new Order();
                     $result = $order->add_order($pay_type,$refid);
                        if(array_key_exists('id',$result)){
                       return view('shop.location1',['res'=>$refid]);
                        }else{
                        return redirect()->back()->with('error',$result['error']);
                        }
                   }else{
               return redirect()->back()->with('error','خطا در اتصال به درگاه پرداخت');

                   }

              }
                //--------------------- end mellat bank
              if($pay_type==4){
              $zarinpal = new zarinpal();
              $res = $zarinpal->pay($price,'hosseinshirinegad13660630@gmail.com','09114030262');
              if($res){
                    $order = new Order();
                     $result = $order->add_order($pay_type,$res);
                        if(array_key_exists('id',$result)){

                           $url = 'https://www.zarinpal.com/pg/services/StartPay/'.$res;
                           return redirect($url);

                        }else{
                        return redirect()->back()->with('error',$result['error']);
                        }

              }
              }
              //-----------------------end zarinpal connect

            }elseif($pay_type==5 || $pay_type==6 || $pay_type==7){

             $order = new Order();
             $result = $order->add_order($pay_type);
            if(array_key_exists('id',$result)){
                GiftCart::remove_gift_cart();
                $order_id = $result['id'];
                 $order = Order::with('get_user_address','get_order_row','get_user')->find($order_id);
                \Mail::to($order->get_user->email)->send(new \App\Mail\OrderMail($order) );
                $url = 'user/order?id=' . $result['id'];
                return redirect($url);
            }else{
                return redirect()->back()->with('error',$result['error']);
            }

            }else{
     return redirect()->back()->with('error','خطا در ثبت اطلاعات سفارش');
            }

        }else{
        return redirect()
                    ->back()
                    ->with('error','شیوه پرداخت نامعتبر است');
        }

        }else{
         return redirect('shipping');
        }

     }else{
        return redirect('cart');
     }
    }
        #---------------------------------------------------------------------------------------

     public function show_order(Request $request){
        $order_id = $request->id;
        $user_id = Auth::user()->id;
        $order = Order::with(['get_user_address.get_ostan','get_user_address.get_shar','get_order_row'])
            ->where(['id'=>$order_id,'user_id'=>$user_id])
            ->firstOrFail();
        return view('shop.show_order',['order'=>$order]);
    }

    public function print_order(Request $request){
        $order_id = $request->id;
        $user_id = Auth::user()->id;
        $order = Order::with(['get_user_address','get_order_row'])
        ->where(['id'=>$order_id,'user_id'=>$user_id])->firstOrFail();
      return view('shop.print_order',['order'=>$order]);
    }

    public function create_barcode(Request $request){

        $code = $request->get('order_code').'123';
        $fontSize = 10;
        $marge    = 10;
        $x        = 100;
        $y        = 40;
        $height   = 50;
        $width    = 2;
        $angle    = 0;

        $type     = 'ean13';


        $im     = imagecreatetruecolor(200, 80);
        $black  = ImageColorAllocate($im,0x00,0x00,0x00);
        $white  = ImageColorAllocate($im,247,249,250);

        imagefilledrectangle($im, 0, 0, 200, 80, $white);

        $data =Barcode::gd($im, $black, $x, $y, $angle, $type, array('code'=>$code), $width, $height);

       header('Content-type: image/png');
        imagepng($im);
        return Response::make('',200)->header('Content-type','image/png');

    }

    public function create_pdf(Request $request){

        $order_id = $request->id;

        $user_id = Auth::user()->id;

        $order = Order::with(['get_user_address','get_order_row'])

        ->where(['id'=>$order_id,'user_id'=>$user_id])->firstOrFail();

         $pdf =PDF::loadView('shop/pdf_order',compact('order'));
        // $pdf->save('path file')
        // $pdf->>stream();
         $pdf->download('q.pdf');
}
//-------------------mellat bank method-----------------------------------------------------------------------
public function update_order(Request $request){
        $RefId = $request->get('RefId');
        $ResCode = $request->get('ResCode');
        $SaleOrderId = $request->get('SaleOrderId');
        $SaleReferenceId = $request->get('SaleReferenceId');

        if($ResCode==0){
        $order= Order::with('get_user_address','get_order_row','get_user')->where('code1',$RefId)->first();
        if($order){

         require_once('../app/lib/nusoap.php');
        $mellat_bank= new Mellat_Bank();
        if($mellat_bank->Verify($SaleOrderId,$SaleReferenceId)){
        $order->code2 = $SaleReferenceId;
        $order->pay_status = 1;
        $order->update();
        GiftCart::remove_gift_cart();
        \Mail::to($order->get_user->email)->send(new \App\Mail\OrderMail($order) );
        return view('shop.show_order',['order'=>$order]);

        }else{return View('pay_error');}

        }else{return View('pay_error');}

        }else{return View('pay_error');}
}
//-------------------zarinpal method-----------------------------------------------------------------------
public function update_order2(Request $request){

        $Authority = $request->get('Authority');
        $Status = $request->get('Status');

        if($Status=='ok'){
        $order= Order::with('get_user_address','get_order_row','get_user')->where('code1',$Authority)->first();
        if($order){

         if($order->pay_status==0){
        $zarinpal= new zarinpal();
        $res = $zarinpal->Verify($Order->price,$Authority);
        if($res){

        $order->code2 = $res;
        $order->pay_status = 1;
        $order->update();
        GiftCart::remove_gift_cart();
        \Mail::to($order->get_user->email)->send(new \App\Mail\OrderMail($order) );
        return view('shop.show_order',['order'=>$order]);

        }else{return View('pay_error');}

         }else{return View('pay_error');}



        }else{return View('pay_error');}

        }else{return View('pay_error');}
}

public function check_discount_code(Request $request){
  
  if($request->ajax()){
    $price = Session::get('price',0);
    $code = $request->discount_code;
    $discount = Discount::where('code', $code)->get();

    if(sizeof($discount)>0){
      $result = Discount::check_discount($discount,$price);

      if($result) {

          Session::put('discount',$result);
          $price2 =GiftCart::get_price();

        $r = 'کد تخفیف وارد شده صحیح می باشد مبلغ قابل پرداخت '.number_format($price2).' تومان';
        return $r;
      }else{
          Session::put('discount',0);
        $r2='کد تخفیف وارد شده نامعتبر هست';
        return $r2;
      }
    }else{$r2='کد تخفیف وارد شده نامعتبر هست';
        return $r2;}
  }
}

public function check_gift_code(Request $request){
  
  if($request->ajax()){
    $user_id = Auth::id();
    $gift_code=$request->gift_code;
    $r= GiftCart::where(['user_id'=>$user_id,'code'=>$gift_code])->first();

    if($r){
        $gift_array=Session::get('gift_list',[]);
        
        $gift_array[$r->code]=$r->value;
        Session::put('gift_list',$gift_array);
        $p = GiftCart::get_price();

        // Session::forget('discount');
        // Session::forget('gift_list');
        $html='<div>کارت هدیه وارد شده صحیح می باشد مبلغ قابل پرداخت '.number_format($p).'</div>';
        return $html;
    }else{
        return -1;
    }
  
  }
}
















}//end class
