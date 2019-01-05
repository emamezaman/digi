<?php

namespace App\Http\Controllers\admin;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Color;
use App\Item;
use DB;
use App\Review;
use App\File;
use App\ProductImage;
use App\ItemProduct;
use App\Filter;
use App\FilterProduct;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->all();
        $products = Product::search($data);

        return view('admin.product.index',compact('products','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat_list = Product::get_cat_list();
        return view('admin.product.create',compact('cat_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

      $product = new Product($request->all());
      $title_url = str_replace('-', '', $request->title);
      $title_url = str_replace('/', '', $title_url);
      $product->title_url = preg_replace('/\s+/', '-', $title_url);
      //======================================================
      $code_url = str_replace('-', '', $request->code);
      $code_url = str_replace('/', '', $code_url);
      $product->code_url = preg_replace('/\s+/', '-', $code_url);
      $product->saveOrFail();
      $product->categories()->sync($request->cat);
        $color_name = $request->color_name;
        $color_code = $request->color_code;
        if(is_array($color_name) ){
            foreach ($color_name as $key=>$value){
                if(!empty($value) && !empty($color_code[$key])){
                $color = new Color();
                $color->title = $value;
                $color->code = $color_code[$key];
                $product->colors()->save($color);
                }
            }
        }
        return redirect()->route('product.edit',$product->id);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $cat_list = Product::get_cat_list();
       return view('admin.product.update',compact('product','cat_list'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
      // dd($request->all());
      $product = Product::findOrFail($id);
      $title_url = str_replace('-', '', $request->title);
      $title_url = str_replace('/', '', $title_url);
      $product->title_url = preg_replace('/\s+/', '-', $title_url);
      //======================================================
      $code_url = str_replace('-', '', $request->code);
      $code_url = str_replace('/', '', $code_url);
      $product->code_url = preg_replace('/\s+/', '-', $code_url);
      $product->product_status = ($request->has('product_status' ? '1' : '0'));
      $product->show_product = ($request->has('show_product' ? '1' : '0'));
      $product->special = ($request->has('special' ? '1' : '0'));
      $product->update($request->all());
      $product->categories()->sync($request->cat);
        $color_name = $request->color_name;
        $color_code = $request->color_code;

        if(is_array($color_name) ){
            foreach ($color_name as $key=>$value){
                 if($key > 0 ){

                    if(!empty($value) &&  !empty($color_code[$key])){
                        //update color
                       DB::table('color')
                       ->where('id',$key)
                       ->update(['title'=>$value,'code'=>$color_code[$key]]);
                    }else{
                        //delete color
                        DB::table('color')->where('id',$key)->delete();
                    }

                 }else{
                    //insert new color
                if(!empty($value) && !empty($color_code[$key])){
                $color = new Color();
                $color->title = $value;
                $color->code = $color_code[$key];
                $product->colors()->save($color);
                }
                 }


            }

        }
        return redirect()->route('product.edit',$product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        //delete category
        DB::table('category_product')
        ->where('product_id',$id)->delete();
        // delete colors
        DB::table('color')
        ->where('product_id',$id)->delete();
        return back();

    }

    // methog gallery
        public function gallery($id)
     {
        $product = Product::findOrFail($id);
        $product_images = DB::table('product_image')
        ->where('product_id',$id)
        ->get();


        return view('admin.product.gallery',compact('product','product_images'));
     }


//upload file product
public function upload(Request $request,$id )
{
      $file = $request->file('file');
      $ex = $file->getClientOriginalExtension();
      $na = $file->getClientOriginalName();
      $name = md5($na.time().$id).'.'.$ex;
      $type = $request->type;
      if($file->move('upload/product_image',$name)){
        if($type){
         File::create(['url'=>$name,'product_id'=>$id,'type'=>$type]);
        }else{
         ProductImage::create(['url'=>$name,'product_id'=>$id]);

        }
          return 1;
      }else{
      return 0;
      }
}
// delete image product
public function del_img(Request $request,$id){
   $model = $request->model;

   switch ($model) {
     case 'File':
      $image = File::findOrFail($id);
       if(!empty($image->url)){
        $url = url('upload/product_image/'.$image->url);
       }
       break;
     case 'ProductImage':
     $image = ProductImage::findOrFail($id);
     if(!empty($image->url)){
        $url = url('upload/product_image/'.$image->url);
       }
      break;
   }

   if(file_exists($url)){
    unlink($url);
   }
    $image->delete();
    return redirect()->back();

}




    // review product
     public function add_review_form(Request $request){
          $product_id = $request->product_id;
          $product = Product::findOrFail($product_id);
          $review = Review::where('product_id',$product_id)->first();
          $images = File::where(['product_id'=>$product_id,'type'=>'review'])->get();
          return view('admin.product.add-review',array('product'=>$product,'images'=>$images,'review'=>$review));
          }
// review save or store
          public function review_store(Request $request){
           // $request->validate(
           // ['review_tozihat'=>'required'],
           // ['required'=>'وارد کردن :attribute الزامی است'],
           // ['review_tozihat'=>'توضیحات نقد و برسی']);
             $review = Review::where('product_id',$request->product_id)->first();
             if($review){
                $review->update($request->all());
             }else{
            $review = new Review($request->all());
            $review->saveOrFail();
             }
            return redirect()->back();
          }


          // ======================
          //add item product
          public function add_item_form($product_id){
            $product =Product::findOrFail($product_id);
            $items = Item::get_items($product->id);
            return view('admin.product.add_item_form',['product'=>$product,'items'=>$items]);
          }

          // ========================
          //store item product
          public function add_item_store(Request $request){

            $id = $request->product_id;
            $product = Product::findOrFail($id);
            $items = array();
            $items = $request->val;
            ItemProduct::where('product_id',$id)->delete();
            foreach($items as $key=>$value){
            if(!empty($value)){
              ItemProduct::create([
                'product_id'=>$id,'item_id'=>$key,'value'=>$value
            ]);
            }
            }
            // dd($request->all());
            return redirect()->back();
          }

           // ======================
          //add filter product
          public function add_filter_form($product_id){

            $product =Product::findOrFail($product_id);
            $filter_value =Filter::get_value($product_id);
            $filters = Filter::get_filters($product->id);
            return view('admin.product.add_filter_form',['product'=>$product,'filters'=>$filters,'filter_value'=>$filter_value]);
          }

           public function add_filter_store(Request $request){
               //echo '<pre>'. print_r($request->all(),true).'</pre>';
               $id = $request->id;
               $product = Product::findOrFail($id);
               $filter = $request->filter;
               $filter2 = $request->filter2;
                DB::table('filter_product')->where('product_id',$id)->delete();
                if(is_array($filter)){
                 foreach ($filter as $key => $value) {

                   DB::table('filter_product')->insert([
                   'product_id'=>$id,'filter_id'=>$key,'value'=>$value
                   ]);

                 }
               }
               if(is_array($filter2)){

                 foreach ($filter2 as $key => $value) {
                   foreach ($value as $key2 => $value2) {
                   DB::table('filter_product')->insert([
                   'product_id'=>$id,'filter_id'=>$key,'value'=>$value2
                   ]);
                 }
                 }
               }


            return redirect()->back();
           }






}





