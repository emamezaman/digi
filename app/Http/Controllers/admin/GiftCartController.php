<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GiftCartRequest;
 use App\User;
use App\GiftCart;
use App\lib\JDF;
class GiftCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  
      $gift_carts = GiftCart::orderBy('id','DESC')->paginate(20);
      return View('admin.gift_cart.index',['gift_carts'=>$gift_carts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_list = User::orderBy('id','DESC')->pluck('username','id');
        return view('admin.gift_cart.create',compact('user_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GiftCartRequest $request)
    {
        $data=$request->except('_token');
        $jdf = new JDF();
        $e=explode('/', $data['date']);
        if(sizeof($e)==3){
          $y=$e[0];
          $m=$e[1];
          $d=$e[2];
          $time = $jdf->jmktime(23,59,59,$m,$d,$y);
          $data['time']=$time;
          $t = time();
          $t=substr($t,5,5);
          $code = 'DigiGift'.$request->user_id.$t;
          $data['code']=$code;
          $gift = new GiftCart($data);
          $gift->saveOrFail(); 
          $url='admin/gift_cart/order/'.$gift->id.'/edit';
          return redirect($url);

        }else{
            //error
        }
     

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_list = User::orderBy('id','DESC')->pluck('username','id');
        $gift_cart = GiftCart::find($id);

        return view('admin.gift_cart.edit',['gift_cart'=>$gift_cart,'user_list'=>$user_list]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GiftCartRequest $request, $id)
    {

        $gift=GiftCart::find($id);
        $data=$request->except('_token');
        $jdf = new JDF();
        $e=explode('/', $data['date']);
        if(sizeof($e)==3){
          $y=$e[0];
          $m=$e[1];
          $d=$e[2];
          $time = $jdf->jmktime(23,59,59,$m,$d,$y);
          $data['time']=$time;
          $t = time();
          $t=substr($t,5,5);
          $code = 'DigiGift'.$request->user_id.$t;
          $data['code']=$code;
          $gift->update($data);
         return redirect()->back(); 

        }else{
            //error
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          
        $gift = GiftCart::find($id);
        $gift->delete();
        return redirect()->back();
    }
}
