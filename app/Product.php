<?php

namespace App;
use App\CatProduct;
use App\ProductImage;
use App\Score;
use DB;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
	protected $fillable = [
		'title', 'title_url', 'code', 'code_url', 'price', 'discounts', 'image', 'view', 'text', 'product_status', 'bon', 'show_product', 'product_number', 'order_product', 'keyword', 'description', 'special', 'like', 'deslike',
	];
	protected $table = 'product';

	public static function get_cat_list() {

		$cat = Category::where(['parent_id' => 0])->get();
		$cat_list[0] = 'چیزی انتخاب نشده است';
		foreach ($cat as $key => $value) {
			$cat_list[$value->id] = $value->title_fa;

			foreach ($value->getChild as $key2 => $value2) {
				$cat_list[$value2->id] = ' - ' . $value2->title_fa;
				foreach ($value2->getChild as $key3 => $value3) {
					$cat_list[$value3->id] = ' - - ' . $value3->title_fa;
					foreach ($value3->getChild as $key4 => $value4) {
						$cat_list[$value4->id] = ' - - - ' . $value4->title_fa;
					}
				}}

		}

		return $cat_list;
	}

	// ======================= method
	public function categories() {
		return $this->belongsToMany(Category::class);
	}
	//==============================
	public function colors() {
		return $this->hasMany(Color::class, 'product_id', 'id');
	}

	// method seadch
	public static function search($data) {

		$products = Product::orderBy('id', 'desc');
		$string = "";
		if (sizeof($data) > 0) {

			if (array_key_exists('title', $data)) {

				if (!empty($data['title'])) {
					$products = $products
						->where('title', 'LIKE', '%' . $data['title'] . '%');
				}
				$string = '?title=' . $data['title'];
			}
		}
		//dd($products);
		$products = $products->paginate(10)->withPath($string);
		return $products;
	}

	public function get_image() {
		return $this->hasOne(ProductImage::class, 'product_id', 'id')->orderBy('id', 'ASC')-> withDefault(['url' => '1.jpg']);
	}
	

	public function get_images() {
		return $this->hasMany(ProductImage::class, 'product_id', 'id');
	}

	public function amazings() {
		return $this->hasMany(Amazing::class, 'product_id', 'id');
	}
	//get service
	public function get_service() {
		return $this->hasMany(Service::class, 'product_id', 'id')->where('parent_id', null);
	}

	public static function get_product_cat($cat_id) {

		$product_ids = array();
		$product_ids = DB::table('category_product')

			->where('category_id', $cat_id)->pluck('product_id')->toArray();

		return $product_ids;
	}

	public function get_scores() {
		return $this->hasMany(Score::class, 'product_id', 'id');
	}

	public function get_cats() {
		return $this->hasMany(CatProduct::class, 'product_id', 'id')->orderBy('category_id', 'ASC');
	}

	public static function get_price($cat_id=null){
		 $search_price['min_price'] =0;
		 $search_price['max_price'] =0;
		 $result =array();
		 if($cat_id !=null){

			 $cat_products = CatProduct::where('category_id',$cat_id)->get();
		 }else{
		 	
			 $cat_products = CatProduct::get();
		 }
	    foreach($cat_products as $key=>$value){
	      $result[$key]= $value->get_product->price;
	    }
	    if(sizeof($result)>0){
	    	
	    $search_price['min_price'] = min($result);
	    $search_price['max_price'] = max($result);
	    }

	    return  $search_price;
		}

		public static function search_index($text,$product_status,$type_sort,$min_price,$max_price,$result_search){
           $t= array();
            $t[1] =array('id','DESC');
            $t[2] =array('view','DESC');
            $t[3] =array('order_product','DESC');
            $t[4] =array('price','ASC');
            $t[5] =array('price','DESC');

			$products = Product::with('get_image')
	         ->where(['show_product'=>1]) 
	         ->where('title','LIKE','%'.$text.'%');
	         if($product_status==1){
			    $products =  $products->where(['product_status'=>$product_status]);
			  }
			  
	         $products=$products->orWhere('code','LIKE','%'.$text.'%')->where(['show_product'=>1]) ;

			if($product_status==1){
			    $products =  $products->where(['product_status'=>$product_status]);
			}

			 if( $min_price != 0 &&  $max_price != 0)
               {
                $products  =  $products->where('price','>=',$min_price)->where('price','<=',$max_price);
               }

               if(!empty($result_search)){
               	$products  =  $products->where('title','LIKE','%'.$result_search.'%');
               	
               }

			if(array_key_exists($type_sort, $t)){
				
	         $products =$products->orderBy($t[$type_sort][0],$t[$type_sort][1])->paginate(20);
			}else{

	         $products =$products->orderBy('id','DESC')->paginate(20);
			}

	         return $products;
		}


}
