<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\lib\JDF;
use App\Order;
use App\Setting;
use DB;
class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->only('showLogin');
    }

    public function index(){
    $jdf = new JDF();

    $y = $jdf->tr_num($jdf->jdate('Y'));
    $m = $jdf->tr_num($jdf->jdate('m'));
    $t = $jdf->tr_num($jdf->jdate('t'));
    $date_list = array();
    $total_price = array();
    $order_count = array();

   
    for($i=1;$i<=$t;$i++){

         $date =$y.'-'.$m.'-'.$i;
         $date_list[$i] = $date;
         $price1 = Order::where(['date'=>$date,'pay_status'=>1])->sum('price');
         $total_price[$i] = $price1;
         $count = Order::where(['date'=>$date,'pay_status'=>1])->count();
         $order_count[$i]= $count;
    }
      


    	if(view()->exists('admin.index')){
    	  return view('admin.index',compact(['date_list','total_price','order_count']));
         }
    
 
    }
    

    public function showLogin(){
        return view('admin.admin_login');
    }


    public function statistics (){

    $jdf = new JDF();

    $y = $jdf->tr_num($jdf->jdate('Y'));
    $m = $jdf->tr_num($jdf->jdate('m'));
    $t = $jdf->tr_num($jdf->jdate('t'));

    $date_list = array();
    $total_view = array();
    $view = array();

   
    for($i=1;$i<=$t;$i++){
        if($i < 10){
            $i='0'.$i;
        }

         $date =$y.'-'.$m.'-'.$i;

         $date_list[$i] = $date;

         $row = DB::table('statistics')

         ->where(['year'=>$y,'month'=>$m,'day'=>$i])->first();

         if($row){

             $total_view[$i] = $row->total_view;

             $view[$i] =  $row->view;

         }else{

         $total_view[$i] = 0;

         $view[$i] = 0;
         
         }


    }

    $year_view = DB::table('statistics')

         ->where(['year'=>$y])->sum('total_view');
     

         $total = DB::table('statistics')

         ->sum('total_view');

        return view('admin.statistics',
            compact('date_list','view','total_view','year_view','total'));
    }
//---------------------------------------------------------------------------
    public function pay_setting_form(){
       
        $TerminalId = Setting::get_value('TerminalId');
        $UserName   = Setting::get_value('UserName');
        $Password   = Setting::get_value('Password');
        $MerchantID = Setting::get_value('MerchantID');
        return view('admin/pay_setting',compact('TerminalId','UserName','Password','MerchantID'));
    }

    public function save_pay_setting(Request $request){
        $data = $request->except('_token');
         Setting::set_value($data);
        return redirect()->back();
    }


    
}
