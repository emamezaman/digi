<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Ostan;
class OstanController extends Controller
{
     public function index(){
         $ostans = Ostan::orderBy('id','DESC')->paginate(12);
    	return view('admin.ostan.index',compact('ostans'));
    }

    public function create(){
    	return view('admin.ostan.create');
    }

     public function show($id){

    }
     public function edit($id){
     	$ostan = Ostan::findOrFail($id);
    	return view('admin.ostan.update',compact('ostan'));
    }


    public function store(Request $request){
    	$validate = Validator::make($request->all(),['ostan_name'=>'required'],[],['ostan_name'=>'نام استان']);
    	if($validate->fails()){
    		return redirect()->back()->withErrors($validate)->withInput();
    	}
    	$ostan = new Ostan($request->all());
    	$ostan->save();
    	$url ='admin/ostan/'.$ostan->id.'/edit';
    	return redirect($url);

    }

    public function update(Request $request,$id){
    	$ostan = Ostan::findOrFail($id);
    	$validate = Validator::make($request->all(),['ostan_name'=>'required'],[],['ostan_name'=>'نام استان']);
    	if($validate->fails()){
    		return redirect()->back()->withErrors($validate)->withInput();
    	}
    	$ostan->update($request->all());
    	return redirect()->back();
    }
     public function destroy($id){
         $ostan = Ostan::findOrFail($id);
         $ostan->delete();

         return redirect()->back();
     }


}
