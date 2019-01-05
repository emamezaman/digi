<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Amazing;
use App\Http\Requests\AmasingRequest;
class AmazingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $amazings = Amazing::orderBy('id','DESC')->paginate(10);
        return view('admin.amazing.index',compact('amazings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::where(['product_status'=>1])->get();
        foreach($product as $key=>$value){
            $product_list[$value->id] = $value->title; 
        }
        // $product_list = array('0'=>'انتخاب نمائید') + $product_list;
        return view('admin.amazing.create',compact('product_list'));
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AmasingRequest $request)
    {
        $id = $request->product_id;
        $product = Product::findOrFail($id);
        $amazing = new Amazing($request->all());
        $amazing->timestamp = time() + $request->time * 3600;
        $amazing->title = $product->title;
        $amazing->saveOrFail();
        $url = 'admin/amazing/'.$amazing->id .'/edit';
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
        $product = Product::findOrFail($id);
        dd($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $amazing = Amazing::findOrFail($id);
        $products = Product::where(['product_status'=>1])->get();
        foreach($products as $key=>$value){
            $product_list[$value->id] = $value->title; 
        }
        return view('admin.amazing.update',compact('amazing','product_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AmasingRequest $request, $id)
    {
        
        $amazing = Amazing::findOrFail($id);
        if($request->time != $amazing->time){
        $amazing->timeStamp = time() + $request->time * 3600;
        }
        if($amazing->product_id != $request->product_id){
        $product = Product::findOrFail($request->product_id);
        $amazing->title = $product->title;
        }
        $amazing->update($request->all());
        $url = 'admin/amazing/'.$amazing->id .'/edit';
        return redirect($url);
     
    }
  
        


             


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $amazing = Amazing::findOrFail($id);
        $amazing->delete();
        $url = 'admin/amazing';
        return redirect($url);
    }

    public function allDelete(Request $request ){
         $x = explode(',',$request->id);
         var_dump($x);
        // return redirect()->back();
    
    }   

}
