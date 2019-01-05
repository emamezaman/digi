<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Session;
use App\Http\Requests\CategoryRequest;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
        {
       $data= $request->all();
        $categories = Category::search($data);
        return view('admin.category.index',
            compact('categories','data'));
        }
           
         
            

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
         $cat_list = Category::get_cat_list();
       
        return view('admin.category.create',compact('cat_list'));
    }
    
        
          

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
   
         $category = new Category($request->all());
        if($category->save()){

           if($request->hasfile('image')){
               $image_file = $request->image;   
               $name ='category' . $category->id.'.'.$image_file->getClientOriginalExtension(); 
               $image_file->move(public_path('upload/category_image'),$name);
               $category->image=$name;
               $category->save();
           }

        Session::flash('success',$category->title_fa .' با موفقیت ثبت شد');
              return redirect()->route('category.edit',$category->id);
        }
        Session::flash('warning','مشکلی پیش آمده مججد تلاش کنید');
        return back();
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
        $category = Category::findOrFail($id);
         $cat_list = Category::get_cat_list();
         return view('admin.category.edit',compact('category','cat_list'));
    }

          

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id )
    {
        // if($request->has('is_active')){
        //    $category->is_active=1;
        // }else{
        //     $category->is_active =0;
        $category = Category::findOrFail($id);
      
        if($category->update($request->all())){

           if($request->hasfile('image')){
               $image_file = $request->image;   
               $name ='category' . $category->id.'.'.$image_file->getClientOriginalExtension(); 
               $image_file->move(public_path('upload/category_image'),$name);
               $category->image=$name;
               $category->save();
           }

        Session::flash('success',$category->title_fa .' با موفقیت ویرایش شد');
              return back();
        }
        Session::flash('warning','مشکلی پیش آمده مججد تلاش کنید');
        return back();
    }
        // }
    
       
         

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
         $category = Category::findOrFail($id);
         $url = $category->image;
        if($category->delete()){
        Session::flash('success', $category->title_fa.' با موفقیت حذف شد');
          if(file_exists($url)){
        unlink('upload/category_image/'.$url);
    }
        return redirect()->route('category.index');
        
        } 
        
        Session::flash('warning','مشکلی پیش آمده برای حذف مجد تلاش کنید.');
        return redirect()->route('category.index');
    }
    // =======================================
    public function del_img($id){
       $category = Category::findOrFail($id);
       $image= $category->image;
       if(!empty($image)){
        $url = 'upload/category_image/'.$image;
        if(file_exists($url)){
            unlink($url);
            $category->image = '';
            $category->update();
        }
       }
       return back();
    }





}
