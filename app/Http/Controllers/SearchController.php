<?php

namespace App\Http\Controllers;

use App\FilterProduct;
use Illuminate\Http\Request;
use App\Filter;
use App\Category;
use App\Search;
use App\Product;
use App\Slider;
use DB;
use App\CatProduct;

use Session;
use App\lib\Mobile_Detect;
class SearchController extends Controller
{

    protected $view;
    public function __construct(){

       $detect =  new Mobile_Detect();
       $this->view = '';
       if($detect->isMobile() || $detect->isTablet()){
          $this->view = 'mobile.';
       }



     }


  public function search(Request $request,$cat1,$cat2,$cat3){

    $search_price = array('min_price'=> 0,'max_price' => 0);
  	$category1=Category::where('title_en',$cat1)->firstOrFail();
  	$category2=Category::where(['title_en'=>$cat2,'parent_id'=>$category1->id])->firstOrFail();
  	$category3=Category::where(['title_en'=>$cat3,'parent_id'=>$category2->id])->firstOrFail();
    $search_price=Product::get_price($category3->id);
   

     Session::put('cat1',$category1);
     Session::put('cat2',$category2);
     Session::put('cat3',$category3);

    $get =  $request->all();

  if(sizeof($get)>0){
      //اینجا تمام فیلتر دسته ها خونده میشه
  	  $filter = Filter::getFilter($category1->id,$category2->id,$category3->id);

  	  $search = new Search($get);
  	  $data =  $search->getProduct();


      return view('site.search',['filter'=>$filter,'products'=>$data['products'],'filter_ids'=>$data['filter_id'],'category1'=>$category1,'category2'=>$category2,'category3'=>$category3,'total_count'=>$data['total_count'],'search_price'=>$search_price]);



  }
  }
    public function ajax_search(Request $request){

        if($request->ajax()){
            $filter1 = array();
            $filter2 = array();
            $products = array();
            $product_ids = array();
            $filter1 = $request->checks_value;
            $product_status = $request->get('product_status',1);
            $type_sort = $request->get('type_sort',1);
            $search_value = $request->get('search_value','');
            $min_price = $request->get('min_price',0);
            $max_price = $request->get('max_price',0);
            $cat3_id = $request->get('cat3_id',0);
            
            $t= array();
            $t[1] =array('id','DESC');
            $t[2] =array('view','DESC');
            $t[3] =array('order_product','DESC');
            $t[4] =array('price','ASC');
            $t[5] =array('price','DESC');


            foreach ($filter1 as $key => $value) {
                $e = explode('_', $value);
                if(sizeof($e)==2){

                    $filter2[$e[0]][]=$e[1];
                    $product_ids[$e[0]][]='';

                }
            }

            foreach ($filter2 as $key=>$value){
                $i=0;
                foreach ($value as $key2=>$value2) {
                    $row = FilterProduct::where('value',$value2)->get();

                    foreach ($row as $key3=>$value3) {
                        $product_ids[$key][$i]=$value3->product_id;

                        $i++;
                    }

                }

            }

            //اندیس های رشته ای رو حذف مینمائیم
            $product_ids = array_values($product_ids);

            if(sizeof($product_ids)>1){
                $product_ids = call_user_func_array('array_intersect',$product_ids);
            }else if(sizeof($product_ids)==1) {
                $product_ids = $product_ids[0];
            }

            if(sizeof($product_ids) > 0){
              $products  = Product::with('colors')
              ->whereIn('id',$product_ids)->where('show_product',1);
            }else{
              $product_ids = Product::get_product_cat($cat3_id);
              $products  = Product::with('colors')
              ->whereIn('id',$product_ids)->where('show_product',1);
            }

              
            if($product_status==1){
                 $products  =  $products->where('product_status',1);
               }

               if((!empty($min_price) && $min_price != 0) && (!empty($max_price) && $max_price != 0))
               {
                $products  =  $products->where('price','>=',$min_price)->where('price','<=',$max_price);
               }

                 if(!empty($search_value)){

                     $products  =  $products->where('title','LIKE','%'.$search_value.'%');
               }



               $total_count = $products->count();

               if(array_key_exists($type_sort, $t)){

                   $products  = $products->orderBy($t[$type_sort][0],$t[$type_sort][1])->paginate(10);
               }else{

                   $products  = $products->orderBy('id','DESC')->paginate(10);


               }

            $category1=Session::get('cat1');
            $category2=Session::get('cat2');
            $category3=Session::get('cat3');

            $view_name =  $this->view.'include.search';

            return view( $view_name ,['products'=>$products ,
              'category1'=>$category1,'category2'=>$category2,'category3'=>$category3,'total_count'=>$total_count]);

        }

    }











    public function category($cat1,$cat2){

       $category1=Category::where('title_en',$cat1)
       
       ->firstOrFail();

       $category2=Category::where(['title_en'=>$cat2,'parent_id'=>$category1->id])
        
        ->firstOrFail();
      
         $cat_list = Category::get_show_child_cat($category2->id);
      if($this->view==''){

        $cat_list = Category::where('parent_id',$category2->id)->get();
    
    $search_price=Product::get_price($category2->id);
    
    $product_ids = Product::get_product_cat($category2->id);
    
    $products  = Product::with(['get_image','colors'])
    ->whereIn('id',$product_ids)->where('show_product',1)->orderBy('id','DESC');
    $total_count = $products->count();
    $products = $products->paginate(20);
  

    return view('site.show_product_cat2',compact('products','category1','category2','total_count','search_price','cat_list'));

      }else{

        $sliders = Slider::orderBy('id','DESC')->limit(5)->get();


         $product_ids = array();

         $get_product_ids = DB::table('category_product')->where('category_id',$category2->id)->get();

         foreach ($get_product_ids as $key => $value) {

             $product_ids[$value->product_id] = $value->product_id;

         }


       $new_product = Product::with('get_image')->where('product_status',1)->whereIn('id',$product_ids)->orderBy('id','DESC')->limit(15)->get();

       $order_product = Product::with('get_image')->where('product_status',1)->whereIn('id',$product_ids)->orderBy('order_product','DESC')->limit(15)->get();

       $view_product = Product::with('get_image')->where('product_status',1)->whereIn('id',$product_ids)->orderBy('view','DESC')->limit(15)->get();

         $view_name = $this->view.'search.show_cat';

         return view($view_name,compact('sliders','category2','cat_list','category1','product_ids','view_product','order_product','new_product'));
        
      }


    }
    //=======================================================================================================

   public function show_product($cat1,$cat2,$cat3){

        $category1=Category::where('title_en',$cat1)->firstOrFail();

        $category2=Category::where(['title_en'=>$cat2,'parent_id'=>$category1->id])

        ->firstOrFail();

        $category3=Category::where(['title_en'=>$cat3,'parent_id'=>$category2->id])

        ->firstOrFail();

        $search_price=Product::get_price($category3->id);

        $product_ids =Product::get_product_cat($category3->id);

        $products=  Product::with('get_image')->where('show_product',1)->whereIn('id',$product_ids);
        $total_count = $products->count();
        $products = $products->orderBy('view','DESC')->paginate(10);
            $cat_list = Category::where('parent_id',$category3->id)->get();
        if($this->view==''){

            $view_name =$this->view.'site.show_product_cat3';
             return view($view_name,compact('products','category1','category2','cat_list','category3','search_price','total_count'));

        }else{

        $filters = Filter::getFilter($category1->id,$category2->id,$category3->id);

        $view_name =$this->view.'search.show_product';

        return view($view_name,compact('products','filters','category3','search_price'));
        }


   }

   public function show_product_cat4 ($cat1,$cat2,$cat3,$cat4){
      
       $category1=Category::where('title_en',$cat1)->firstOrFail();

        $category2=Category::where(['title_en'=>$cat2,'parent_id'=>$category1->id])

        ->firstOrFail();

        $category3=Category::where(['title_en'=>$cat3,'parent_id'=>$category2->id])

        ->firstOrFail();


         $category4=Category::where(['title_en'=>$cat4,'parent_id'=>$category3->id])

        ->firstOrFail();


        $search_price=Product::get_price($category4->id);
        
        $product_ids =Product::get_product_cat($category4->id);

        $products=  Product::with('get_image')->where('show_product',1)->whereIn('id',$product_ids);

        $total_count = $products->count();
        
        $products = $products->orderBy('view','DESC')->paginate(10);

         return view('site.show_product_cat4',compact('products','category1','category2','category3','category4','search_price','total_count'));
        
   }

   public function show_product_cat1($cat1){

    $category1 = Category::where('title_en',$cat1)->firstOrFail() ;

    $cat_list = Category::where('parent_id',$category1->id)->get();
    
    $search_price=Product::get_price($category1->id);
    
    $product_ids = Product::get_product_cat($category1->id);
    
    $products  = Product::with(['get_image','colors'])
    ->whereIn('id',$product_ids)->where('show_product',1)->orderBy('id','DESC');
    $total_count = $products->count();
    $products = $products->paginate(20);
  

    return view('site.show_product_cat1',compact('products','category1','total_count','search_price','cat_list'));

   }

}























