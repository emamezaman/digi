<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\GiftCart;
use Auth;
class UserController extends Controller
{
	
	public function __construct(){
          
	}
   public function index(){
   	return view('user.index');
   }
   public function my_orders(){
      $orders = Order::where('user_id',Auth::id())->orderBy('id','desc')->paginate(10);
   return view('user.my_orders',['orders'=>$orders]);
   }

     public function gift_cart(){
   	$gift_carts = GiftCart::where('user_id',Auth::id())->orderBy('id','desc')->paginate(10);
      return view('user.gift_cart',['gift_carts'=>$gift_carts]);
   }
}
