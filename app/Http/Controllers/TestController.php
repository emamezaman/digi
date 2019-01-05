<?php

namespace App\Http\Controllers;
use App\Mail\FirstMail;
use Illuminate\Http\Request;
use App\User;
 
 use Mail;
use Auth;
use PDF;
use DB;
  	use Dompdf\Dompdf;
class TestController extends Controller
{
	public function __construct(){
	    $this->middleware('guest')->only('aa');
	}


//
   public function email(){

      $order ='hossein order email testi';
   	 Mail::to('hossein13660630@gmail.com')->queue(new FirstMail($order));
   }
//    public function sms(){
//    	\Smsir::send(['test1'],['09114030262']);

// // return \Smsir::credit();
//    }
//
//    public function captcha_get(){
//        return view('captcha');
//    }
//    public function captcha_post(Request $request){
//    	$request->validate([
//       'name'=>'required',
//       'family'=>'required',
//       'captcha' => 'required|captcha'
//    	],[
//        'captcha'=>'کد امنیتی درست وارد نشده',
//        'required'=>'پر کردن :attribute الزامی است',
//    	],[
//      'name'=>'نام',
//      'family'=>'فامیلی',
//      'captcha'=>'کد امنیتی',
//    	]);
//
//    }


    // ===================== user file pdf

   public function user_pdf(){

   //  $pdf = PDF::loadView('user-pdf',['users'=>$users])->save('css/1.pdf');
   	    $order_id = 13;
        $user_id = Auth::user()->id;
        $order = Order::with(['get_user_address','get_order_row'])
        ->where(['id'=>$order_id,'user_id'=>$user_id])->firstOrFail();
        $pdf =PDF::loadView('user-pdf',['users'=>$users]);
         $pdf->download('file.pdf');

   }

}
