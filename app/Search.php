<?php

Namespace App;
use App\Filter;
use DB;

class Search
{
	protected $data;
	public function __construct($data){
       $this->data = $data;
	}
	public  function getProduct(){
         $product_ids = array();
         $filter_ids = array();
         $select_filter = array();

	     $i=0;
	    if(is_array($this->data)){

	    	foreach ($this->data as $key => $value) {

	    		 $bool = $this->check_filter($key);
	    		 if($bool){
	    		 	$j=0;
	    		 	foreach ($value as $key2 => $value2) {
	    		 	$filter = DB::table('filter')->where('id',$value2)->first();
	    		 		if($filter){
	    		 			$filter_name=$filter;

                        }else{
                            $filter_name='';
                        }

	    		 		$filter_ids[$value2]=$filter_name;

	    		 	$row = DB::table('filter_product')->where('value',$value2)->get();
					foreach ($row as $key3 => $value3) {
					  $product_ids[$i][$j]=$value3->product_id;

					  $j++;
					}
	    		 	}
					$i++;
	    		  }

	    	}
	    }

	    $data = $this->productShar($product_ids,$filter_ids);
        $data['products'] = Product::with(['get_image','colors','get_scores'])->whereIn('id',$data['product_id'])
            ->where('show_product',1);


	       $total_count =$data['products']->count();
	       $data['products']= $data['products'] ->orderBy('view','DESC')->paginate(10);
	       $data['total_count'] = $total_count;
	    return $data;
	}

	public function check_filter($ename){

      $filter = Filter::where('ename',$ename)->first();

      if($filter){
      	return true;
      }else{
      	return false;
      }
	}

	public function productShar($product_ids,$filter_ids){

		$data = array();

		if(sizeof($product_ids) > 1 ){

	       $data['product_id'] = call_user_func_array('array_intersect', $product_ids);

		}elseif(sizeof($product_ids) == 1){

         $data['product_id'] = $product_ids[0];
		}else{
            $data['product_id']=$product_ids;
        }
         $data['filter_id'] = $filter_ids;



       return $data;


	}
}



