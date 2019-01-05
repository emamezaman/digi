<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DiscountRequest;
use App\Discount;
class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  
      $discounts = Discount::orderBy('id','DESC')->paginate(10);
      return View('admin.discount.index',['discounts'=>$discounts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.discount.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiscountRequest $request)
    {
        $discount = new Discount($request->all());
        if(empty($request->time_code)){
            $discount->time = 0;
            $discount->time_code = 0;
        }else{
            $discount->time = time() + $request->time_code * 3600;

        }
        $discount->saveOrFail();
        $url=url('admin/discount/order/'.$discount->id.'/edit');
        return redirect($url);

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
        $discount = Discount::find($id);
        return view('admin.discount.edit',['discount'=>$discount]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DiscountRequest $request, $id)
    {

          $discount = Discount::find($id);
          $data = $request->all();
         if(empty($data['time_code'])){

            $data['time_code']=0;
         }
      if($discount->time_code != $data['time_code']){

            $data['time'] =  time() + $data['time_code'] * 3600;
         }

        $discount->update($data);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $discount = Discount::find($id);
       $discount->delete();
        return redirect()->back();
    }
}
