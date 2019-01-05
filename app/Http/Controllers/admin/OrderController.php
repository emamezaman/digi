<?php

namespace App\Http\Controllers\admin;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(Request $request){
          $data = $request->all(); 
          $orders = Order::search($data);
          return view('admin.order.index',compact('orders','data'));
    }

    public function show($id){
        $order = Order::with('get_order_row')->where('id',$id)->firstOrFail();
        return view('admin.order.show',compact('order'));
    }

    public function setStatus(Request $request){
        if($request->ajax()){
         
         $id =$request->order;   
         $status =$request->status;
         $order = Order::findOrFail($id);
         $order->order_status = $status ;
         $order->update();  
         
         
        }
    }
      
       
        
      
      

    
    public function destroy($id){
        $message ="خطا در حذف ";
        $order = Order::findOrFail($id);
        if($order->delete())
        {

            $message = "با موفقیت حذف شد";

        }
        return redirect()->back()->with(['message'=> $message]);
    }
}
