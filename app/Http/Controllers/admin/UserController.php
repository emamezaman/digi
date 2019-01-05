<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Order;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use Session;
class UserController extends Controller
{
    public function index(Request $request){

    	$users = User::orderBy('id','DESC')->paginate(10);
    	return view('admin.user.index',compact('users'));
    }

    public  function show($id){
    	$user = User::findOrFail($id);
    	$orders = Order::where('user_id',$id)->orderBy('id','DESC')->get();
    	$price = Order::where('user_id',$id)->sum('price');
    	return view('admin.user.show_data_user',compact('user','orders','price'));
    }

     public function destroy($id){

    	$user = User::findOrFail($id);
    	$user->delete();
    	return redirect()->back();
    }

    public function create(){//route : admin/user/craete

    	return view('admin.user.create');
    }

    public function store(UserRequest $request){
    	 
    	$message = 'خطا در ثبت اطلاعات  ' ;
    	$user = new User($request->all());
    	$user->password = Hash::make($request->password);
        if($user->save()){
        
        	  $url = 'admin/user/'. $user->id . '/edit';
        	  $message = "ثبت با موفقیت انجام شد";
        	  return redirect($url)->with('message',$message);
        }
        return redirect()->back()->with('message',$message);

    }

    public function edit($id){
        $user = User::find($id);
    	return view('admin.user.edit',compact('user'));
    }
     
    public function update(UserRequest $request , $id){
    	
        $user = User::find($id);

        if(!empty($request->password)){
        	$user->password = Hash::make($request->password);
        }
        $user->username = $request->username;
        $user->role = $request->role;
        if($user->update()){
           Session::flash('success',$user->username .' با موفقیت ویرایش شد');
        }else{
        	Session::flash( 'error','خطا در ثبت اطلاعات  ') ;
        }
        return redirect()->back();
    	 
        
        	  
        
    	
    }

}
