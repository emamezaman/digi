<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\slider;
use Session;
use App\Http\Requests\SliderRequest;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
        {
       
             $sliders = Slider::orderBy('id','desc')->paginate(12);
             return view('admin.slider.index',compact('sliders'));
        }
           
         
            

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
        return view('admin.slider.create' );
    }
    
        
          

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
   
         $slider = new Slider($request->all());
        if($slider->save()){
       $image_file = $request->image;   
       $name ='slider' . $slider->id.'.'.$image_file->getClientOriginalExtension(); 
       $image_file->move(public_path('upload/slider_image'),$name);
       $slider->image=$name;
       $slider->save();
        Session::flash('success',$slider->title .' با موفقیت ثبت شد');
              return redirect()->route('slider.edit',$slider->id);
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
         $slider = Slider::findOrFail($id);
         return view('admin.slider.edit',compact('slider'));
    }

          

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, $id )
    {
        // if($request->has('is_active')){
        //    $category->is_active=1;
        // }else{
        //     $category->is_active =0;
        $slider = Slider::findOrFail($id);
      
        if($slider->update($request->all())){

           if($request->hasfile('image')){
               $image_file = $request->image;   
               $name ='slider' . $slider->id.'.'.$image_file->getClientOriginalExtension(); 
               $image_file->move(public_path('upload/slider_image'),$name);
               $slider->image=$name;
               $slider->save();
           }

        Session::flash('success',$slider->title .' با موفقیت ویرایش شد');
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
         $slider = Slider::findOrFail($id);
         $url = $slider->image;
        if($slider->delete()){
        Session::flash('success', $slider->title.' با موفقیت حذف شد');
        unlink('upload/slider_image/'.$url);
        return redirect()->route('slider.index');
        
        } 
        
        Session::flash('warning','مشکلی پیش آمده برای حذف مجد تلاش کنید.');
        return redirect()->route('slider.index');
    }
    // ====================================
    // delete image slider
      public function del_img($id){
       $slider = Slider::findOrFail($id);
       $image= $slider->image;
       if(!empty($image)){
        $url = 'upload/slider_image/'.$image;
        if(file_exists($url)){
            unlink($url);
            $slider->image = '';
            $slider->update();
        }
       }
       return back();
    }
}
