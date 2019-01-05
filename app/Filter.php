<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Filter extends Model
{
    protected  $fillable = ['name','ename','category_id','parent_id','filed'];
    protected $table = 'filter';
    public $timestamps = false;

    public function childs(){
    	return $this->hasMany(Filter::class,'parent_id','id');
    }

       public static function get_filters($id){
    	$cats = DB::table('category_product')->where('product_id',$id)->get();
            $filters = array();
            foreach($cats as $key=>$value){
              $filter= Filter::where(['category_id'=>$value->category_id,'parent_id'=>0])->get();
             
                if(count($filter) > 0){$filters = $filter;break;}
           
            }
    return $filters;
    }

    public function get_filter_value(){
    	return $this->hasOne(FilterProduct::class,'filter_id','id');
    }

    public static function get_value($id){
        $array= array();
    	$filter_value = DB::table('filter_product')->where('product_id',$id)->get();
    	foreach ($filter_value as $key => $value) {
    		$array_key = $value->filter_id.'_'.$value->value;
    		$array[$array_key] = $value->value;
    	}
        return $array;
    }

    public static function getFilter($id1,$id2,$id3){

        $array = array();
        $filter1 = Filter::with('childs')->where(['category_id'=>$id1,'parent_id'=>0])->get();
        $filter2 = Filter::with('childs')->where(['category_id'=>$id2,'parent_id'=>0])->get();
        $filter3 = Filter::with('childs')->where(['category_id'=>$id3,'parent_id'=>0])->get();

        if(sizeof($filter1) > 0){

            $array = $filter1;

        }elseif(sizeof($filter2) > 0){

             $array = $filter2;

        }else{
            if(sizeof($filter3)> 0){ 

             $array = $filter3;
        }

        }
     return $array;
    }
}
