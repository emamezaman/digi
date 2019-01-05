<?php

namespace App\Http\Controllers\admin;
use App\Http\controllers\controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Filter;
use DB;
class FilterController extends Controller
{

	public function index(Request $request){
    var_dump($request->all());
		$cat_list = Product::get_cat_list();
		$id = $request->get('id');
		$filters = Filter::where(['category_id'=>$id,'parent_id'=>0])->get();
 
		return view('admin.filter.create',compact('cat_list','id','filters'));
			
	 
	}

	public function store(Request $request){
	
		 $cat_id = $request->id;
		 $cat = Category::findOrFail($cat_id);
		 $filter_name= $request->get('filter_name',array());
		 $filter_ename= $request->get('filter_ename',array());
		 $filter_filed= $request->get('filter_filed',array());
		 $filter_child= $request->get('filter_child',array());
		 $color_code= $request->get('color_code',array());
		 
		 foreach($filter_name as $key=>$value){
          $ename=array_key_exists($key, $filter_ename) ? $filter_ename[$key]  : '';
          $filed=array_key_exists($key, $filter_filed) ? $filter_filed[$key]  : 1;
	if( $key < 0 ){
			 if(!empty($value) && !empty($ename)){
			    $id = DB::table('filter')->insertGetId(['name'=>$value,'ename'=>$ename,'filed'=>$filed,'category_id'=>$cat_id,'parent_id'=>0]);

            if(is_array($filter_child)){
               if(array_key_exists($key,$filter_child )){

                foreach($filter_child[$key] as $key2=>$value2){
              	if(!empty($value2)){
                     $color_code2 = null;
                      if(is_array($color_code)){
                      	if(array_key_exists($key, $color_code)){
                      		$color_code2= $color_code[$key][$key2];
                      	}
                      }
              	    DB::table('filter')->insert(['name'=>$value2,'ename'=>$color_code2
            	    ,'filed'=>$filed,'category_id'=>$cat_id,'parent_id'=>$id]);
              	      }}}}}}
                  


		 else{
              if(empty($value)){
        	        DB::table('filter')->where('id',$key)->delete();
        	       DB::table('filter')->where('parent_id',$key)->delete();

             }else{
        	      DB::table('filter')->where('id',$key)->update(['name'=>$value,'ename'=>$ename,'filed'=>$filed]);

                  if(is_array($filter_child)){
                 	if(array_key_exists($key,$filter_child ))
                 	{

        	         foreach($filter_child[$key] as $key2=>$value2){
        		       if($key2<0){
        			      if(!empty($value2)){

                             $color_code2 = null;
                              if(is_array($color_code)){
                      	        if(array_key_exists($key, $color_code)){
                      		      $color_code2= $color_code[$key][$key2];
                      	        }
                                    }

        				     DB::table('filter')->insert(['name'=>$value2,'ename'=>$color_code2
            	           ,'filed'=>$filed,'category_id'=>$cat_id,'parent_id'=>$key]);
        			}
        		    }else{

        			if(!empty($value2)){
        				  $color_code2 = null;
                              if(is_array($color_code)){
                      	        if(array_key_exists($key, $color_code)){
                      		      $color_code2= $color_code[$key][$key2];
                      	        }
                                    }
                       DB::table('filter')->where('id',$key2)->update(['name'=>$value2,'filed'=>$filed,'ename'=> $color_code2]);
        			}else{
        					DB::table('filter')->where('id',$key2)->delete();
        			      }
        			
        		    }}}}}}}
		
		return redirect()->back(); 
    }
}

        
		 


		
		 	  
        

             
		 	 	 
		 	 	







