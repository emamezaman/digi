<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Shar;
use App\Ostan;
class SharController extends Controller
{
         public function index(){
         $shars = Shar::with('get_ostan_name')->orderBy('id','DESC')->paginate(12);
    	return view('admin.shar.index',compact('shars'));
      
    }
    
    public function create(){
        $ostans = Ostan::orderBy('id','DESC')->pluck('ostan_name','id')->toArray();
    	return view('admin.shar.create',compact('ostans'));
    }

     public function show($id){
     	
    }
    
     public function edit($id){
     	$shar = Shar::findOrFail($id);
          $ostans = Ostan::orderBy('id','DESC')->pluck('ostan_name','id')->toArray();
    	return view('admin.Shar.update',compact('shar','ostans'));
    }


    public function store(Request $request){
    	$validate = Validator::make($request->all(),['shar_name'=>'required','ostan_id'=>'required'],[],['shar_name'=>'نام شهر','ostan_id'=>'نام استان']);
    	if($validate->fails()){
    		return redirect()->back()->withErrors($validate)->withInput();
    	}
    	$shar = new Shar($request->all());
    	$shar->save();
    	$url ='admin/shar/'.$shar->id.'/edit';
    	return redirect($url);

    }

    public function update(Request $request,$id){
    	$shar = Shar::findOrFail($id);
    	$validate = Validator::make($request->all(),['shar_name'=>'required','ostan_id'=>'required'],[],['shar_name'=>'نام شهر','ostan_id'=>'نام استان']);
    	if($validate->fails()){
    		return redirect()->back()->withErrors($validate)->withInput();
    	}
    	$shar->update($request->all());
    	return redirect()->back();
    }
     public function destroy($id){
         $shar = Shar::findOrFail($id);
         $shar->delete();
         return redirect()->back();
     }
}
