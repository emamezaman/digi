<?php

namespace App\Http\Controllers\admin;
use App\Http\controllers\controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Item;
use DB;
class ItemController extends Controller
{

	public function index(Request $request){
		$cat_list = Product::get_cat_list();
		$id = $request->get('id');
		 $items = Item::where(['category_id'=>$id,'parent_id'=>0])->get();
		return view('admin.item.create',compact('cat_list','id','items'));
	}
		 
 
public function store(Request $request){	
$cat_id = $request->id;
$cat = Category::findOrFail($cat_id);
$item_name= $request->item_name;
$child_item_name= $request->child_item_name;
$child_item_filed= $request->child_item_filed;

if(is_array($item_name)){
	foreach($item_name as $key=>$value){
if( $key < 0 ){
if(!empty($value)){
$id = DB::table('items')->insertGetId(['name'=>$value,'parent_id'=>0,'category_id'=>$cat_id]);

if(is_array($child_item_name)){
if(array_key_exists($key,$child_item_name )){

foreach($child_item_name[$key] as $key2=>$value2){
if(!empty($value2)){
$filed=1;
if(array_key_exists($key,$child_item_filed )){
if(array_key_exists($key2,$child_item_filed[$key] )){
$filed = $child_item_filed[$key][$key2];
	}
}
DB::table('items')->insert(['name'=>$value2,'filed'=>$filed,'category_id'=>$cat_id,'parent_id'=>$id]);
}}}}}}
       
                 
                  

else{
if(empty($value)){
DB::table('items')->where('id',$key)->delete();
DB::table('items')->where('parent_id',$key)->delete();

}else{
DB::table('items')->where('id',$key)->update(['name'=>$value]);

if(is_array($child_item_name)){
if(array_key_exists($key,$child_item_name ))
{

foreach($child_item_name[$key] as $key2=>$value2){
if($key2 < 0){
if(!empty($value2)){
	$filed=1;
if(array_key_exists($key,$child_item_filed )){
if(array_key_exists($key2,$child_item_filed[$key] )){
$filed = $child_item_filed[$key][$key2];
	}
}
DB::table('items')->insert(['name'=>$value2
,'filed'=>$filed,'category_id'=>$cat_id,'parent_id'=>$key]);
}
}else{

if(!empty($value2)){
	$filed=1;
if(array_key_exists($key,$child_item_filed )){
if(array_key_exists($key2,$child_item_filed[$key] )){
$filed = $child_item_filed[$key][$key2];
	}
}
DB::table('items')->where('id',$key2)->update(['name'=>$value2 ,'filed'=>$filed]);
}else{
DB::table('items')->where('id',$key2)->delete();
}

}}}}}}}
}
		return redirect()->back(); 
    }
}

                            

		

        
		 


		
		 	  
        

             
		 	 	 
		 	 	







