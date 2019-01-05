<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use App\Slider;
use App\Product;
use App\Category;
use App\Amazing;
use App\Review;
use App\Item;
use App\Cart;
use App\Color;
use App\Service;
use DB;
use Session;
use Auth;
use App\Shar;
use App\CatProduct;
use App\ProductComment;
use App\Score;
use Validator;
use App\lib\Mobile_Detect;
 
class SiteController extends Controller
{
 protected $view;
 public function __construct(){

  $category= Category::where('parent_id',0)->orderBy('id','ASC')->get();
      View()->share('category',$category);
       $detect =  new Mobile_Detect();
       $this->view = '';
       if($detect->isMobile() || $detect->isTablet()){
          $this->view = 'mobile.'; 
       }

       

     }
 
 public function index(){
    
	   $sliders = Slider::orderBy('id','DESC')->limit(5)->get();

	   $new_product = Product::where('product_status',1)->orderBy('id','DESC')->limit(15)->get();
	  
     $order_product = Product::where('product_status',1)->orderBy('order_product','DESC')->limit(15)->get();
	  
     $view_product = Product::where('product_status',1)->orderBy('view','DESC')->limit(15)->get();
		 
     $amazings = Amazing::orderBy('id','DESC')->get();

     $old_amazing = Amazing::orderBy('timeStamp','DESC')->first();
   
		 $view_name =$this->view.'site.index';
	 
	  return view($view_name,compact('sliders','new_product','order_product','view_product','amazings','old_amazing'));
  }

public function show($code,$title){
    $data=array();
    $product = Product::with(['get_images','get_service','colors'])->where(['code_url'=>$code,'title_url'=>$title])->firstOrFail();
    $product->view = $product->view + 1;
    $product->update(); 
    $items = Item::get_items($product->id);
    $review = Review::where('product_id',$product->id)->first();

    $data = Score::get_data($product->id);
     $view_name =$this->view.'site.product';
	return  view($view_name,['product'=>$product,'review'=>$review,'items'=>$items,'data'=>$data]);
}

// function set service

public function set_service(Request $request){

	$color_id = $request->color_id;

	$product_id = $request->product_id;

	$product = Product::with('colors')->findOrFail($product_id);

	$service_id = $request->service_id;

	 $colors = $product->colors; 

	 $service = $product->get_service;

	 $check = DB::table('service')
   ->where(['parent_id'=>$service_id,'color_id'=>$color_id])
   ->orderBy('id','DESC')->first(); 
   $view_name =$this->view.'include.set_service';
	  return view($view_name,['colors'=>$colors,'service'=>$service,'check'=>$check,'color_id'=>$color_id ,'product'=>$product]);
  }
	
public function addCart(Request $request){
	
   $product_id = $request->product_id;

   $service_id = $request->service_id;

   $color_id = $request->color_id;

   $product = Product::findOrFail($product_id);

   $service = Service::where(['product_id'=>$product_id,'color_id'=>$color_id,'parent_id'=>$service_id])->first();

   if($service){

      Cart::addCart($product_id,$service_id,$color_id);

   }else{

   	if($service_id !=0 && $color_id==0){
        

   		$service = Service::findOrFail($service_id);

	    Cart::addCart($product_id,$service_id,$color_id);
   	
   	}elseif($color_id !=0 && $service_id==0){
   		
   		$color = Color::where(['id'=>$color_id,'product_id'=>$product_id])->

      firstOrFail();

	    Cart::addCart($product_id,$service_id,$color_id);

   	}elseif($color_id==0 && $service_id==0){

	    Cart::addCart($product_id,$service_id,$color_id);

   	}

   }

   return redirect('cart');

 }

public function showCart(){

  $view_name =$this->view.'site.cart';
   
	return view($view_name);
}

//del cart

public function delProductCart(Request $request){

	$product_id = $request->product_id;

	$service_id = $request->service_id ;

	$color_id = $request->color_id;

	Cart::delProduct($product_id,$service_id,$color_id);

	  $view_name =$this->view.'include.ajax_del_cart';

    return view( $view_name);

}

public function setProductCart(Request $request){

	$product_id = $request->product_id;

	$service_id = $request->service_id ;

	$color_id = $request->color_id;

	$value = $request->value;

	Cart::setProduct($product_id,$service_id,$color_id,$value);

    $view_name =$this->view.'include.ajax_del_cart';

	  return view( $view_name);
}

// 
public function authCheck(Request $request){
   if(!Auth::check()){
   	?>
   <script>  $("#login_Modal").modal('show');</script>
   	<?php
	
   }}

public function comment_form($product_id){
	$e = explode('-', $product_id);
	 
	if(sizeof($e)==2 && $e[0]=='DPK'){
		
		 
             
			  $product = Product::with('get_image')->findOrFail($e[1]);
			  $user_id = Auth::id();
			  $obj_score = Score::where(['user_id'=>$user_id,'product_id'=>$product->id])->first();
              $score = Score::get_list_score($obj_score);
              $comment = ProductComment::where(['user_id'=>$user_id,'product_id'=>$product->id])
                 ->first();
			  return view('site.comment_form',compact('product','score','comment','obj_score'));

		 

         
	}else{
		return view('404');
	}}


	public function store_score(Request $request){
        $id = $request->product_id;
        $product = Product::findOrFail($id);
        $range = $request->range;
        $user_id = Auth::id();
        $time = time();
        $v='';
        $count_score = DB::table('score')->where(['user_id'=>$user_id,'product_id'=>$product->id])->count();
        if($count_score==0){
         if(is_array($range)){
              foreach ($range as $key => $value) {
              settype($value,'integer');
              if(is_integer($value)){
              $value = !empty($value)  ? $value : 0;
              $v.=$key.'_'.$value.'@#$%';
             }
           }
            $score = new Score();
            $score->product_id = $product->id;
            $score->user_id = $user_id;
            $score->time = $time;
            $score->value = $v;
            $score->save();
         }
      }
      return redirect()->back();
 }

public function store_comment(Request $request){

      $validator = Validator::make($request->all(),['subject'=>'required'],[],['subject'=>'موضوع نقد و برسی']);
    
      if($validator->fails()){
       return redirect()->back()->withErrors($validator)->withInput();
      }else{
        $id = $request->product_id;
      	$score_id = $request->score_id;
        $product = Product::findOrFail($id);
        $score = Score::findOrFail($score_id);
        $user_id = Auth::id();
      	 $count = DB::table('score')->where(['user_id'=>$user_id,'product_id'=>$product->id])->count();
      	if($count > 0){
      	    $a='';$b='';
      
      $advantages = $request->advantages;
      $subject = $request->subject;
      $desadvantages = $request->desadvantages;
      $comment_text = $request->comment_text;
      $time = time();
     

      	if(is_array($advantages)){
      		foreach ($advantages as $key => $value) {
      			$a.=$value.'@#$%'; 
      		}
      	}
      		if(is_array($desadvantages)){
      		foreach ($desadvantages as $key => $value) {
      			$b.=$value.'@#$%'; 
      		}
      	}

        $comment = new ProductComment();
        $comment->user_id = $user_id;
      	$comment->score_id = $score_id;
      	$comment->product_id = $product->id;
      	$comment->time = $time;
      	$comment->subject = $subject;
      	$comment->advantages = $a;
      	$comment->desadvantages = $b;
      	$comment->comment_text = $comment_text;
      	$comment->save();   	

      		
      	}
      
        return redirect()->back();

      }}

public function ajax_comment(Request $request){
  if($request->ajax()){
    $sum_score = array(1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,);
    $product_id= $request->product_id;
    $tab_id= $request->tab_id;
    $product = Product::findOrFail($product_id);
    if($tab_id=='comments'){
      $scores = Score::where('product_id',$product->id)->paginate(10);

      $view_name = $this->view.'include.ajax_comment_product';
       return view($view_name,compact('scores','product'));
     }
      elseif($tab_id=='questions'){
          $questions = Question::where(['product_id'=>$product->id,'status'=>1,'parent_id'=>0])->orderBy('id','DESC')->paginate(10);
          return view('include.ajax_question_product',compact('questions','product'));
      }

 }
 }

 public function add_question(Request $request ){
     if($request->ajax()){
      $array2=['question'=>'متن سوال'];
      $data = $request->all();
      if (array_key_exists('is_answer',$data)){
         if($data['is_answer']=='is_answer'){
            $array2=['question'=>'متن  پاسخ'];
         }
      }
         $validator = Validator::make($request->all(),
            ['question'=>'required'],
             [],
             $array2
             
         );
         if($validator->fails()){
             return $validator->messages() ;
         }else{

             $product_id =$request->product_id;
             $product = Product::findOrFail($product_id);
             $parent_id = $request->parent_id;
             if($parent_id !=0){
              $qus = Question::findOrFail($parent_id); 
             }else{
              $parent_id =0;
             }

             $time = time();
             $user_id = Auth::id();
             $parent_id = $parent_id;
             $question = new Question();
             $question->product_id = $product->id;
             $question->user_id = $user_id;
             $question->time = $time;
             $question->parent_id = $parent_id;
             $question->question = $request->question;
             if($question->save()){
                 return 'ok';

             }else{
                 return 'error';
             }
          


         }
     }

 }

 public function compare($product1,$product2=null,$product3=null,$product4=null){
   $products_id = [
       'product1'=>$product1,
       'product2'=>$product2,
       'product3'=>$product3,
       'product4'=>$product4
            ];
            
        $items_id = array();
      
      foreach($products_id as $key=>$value){

         if(!empty($value)){
             
         $a = explode('-',$value);

            if(sizeof($a)==2 && $a[0]="DKP"){

          $product_id = $a[1];

          $product = Product::with('get_cats')->where(['id'=>$product_id,'show_product'=>1])->first();
 
          if($product){
            $cats = $product->get_cats;

            foreach($cats as $key2=>$value2){
              $item = Item::where(['category_id'=>$value2->category_id,'parent_id'=>0])
              ->first();
              if($item){
                 $items_id[$product_id] = $item->id;
                 break;
              }else{
                 $items_id[$product_id] = 0;
              }
            }
            
          }
         
            }
         }
     }

    $mode = collect($items_id)->mode();
    $products = array();
    $product_items = array();
    if(sizeof($mode)==1){
      
      $item = Item::findOrFail($mode[0]);

       $cat_list = Category::where('parent_id',$item->category_id)->pluck('title_fa','id')->toArray();
      $items = Item::with('childs')
      ->where(['category_id'=>$item->category_id,'parent_id'=>0])->get();
       
       $i=0;
       
    
       foreach ($items_id as $key => $value) {
       if($value==$mode[0]){
      
        $product = Product::with('get_image')->where(['id'=>$key,'show_product'=>1])->first();
       
        $products[$i] = $product;

        $product_items[$key] = DB::table('item_product')
        ->where(['product_id'=>$key])->pluck('value','item_id')->toArray();
        
        $i++;
       } 
       }
      
      return view('site.compare',compact('items','products','product_items','cat_list'));

    }else{
      return view(404);
    }
 }



 public function ajax_get_product_cat(Request $request){

      if($request->ajax()){

        $cat_id = $request->cat_id;

        $products_id = CatProduct::where('category_id',$cat_id)

        ->pluck('product_id')->toArray();

        $product = Product::with('get_image')->select(['title','code','id'])

        ->whereIn('id',$products_id)->where('show_product',1)

        ->orderBy('view','DESC')->get();
        
        return $product;
      
      }
  }

  public function search(Request $request){
   
       if($request->has('text')){
         $text = $request->get('text');
         $product_status = $request->get('product_status',0);
         $type_sort = $request->get('type_sort',1);
         $min_price = $request->get('min_price',0);
         $max_price = $request->get('max_price',0);
         $result_search = $request->get('result_search',null);
         
         $products = Product::search_index($text,$product_status,$type_sort,$min_price,$max_price,$result_search);
         $search_price = Product::get_price();
          if($request->ajax()){

         return view('include.search2',compact('products','text'));
          }else{
         return view('site.search_index',compact('products','search_price','text'));

          }
       }
       else{
        return redirect('/');
       } 
  }



}//end class sitecontroller










