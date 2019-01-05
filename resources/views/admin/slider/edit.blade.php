


@extends('layouts.admin')

@section('title','ویرایش اسلایدر')

 

@section('content')
@if(session()->has('warning'))
<div class="alert alert-warning alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
    &times;
  </button>
{{session('warning')}}
</div>
@endif
@if(session()->has('success'))
<div class="alert alert-success alert-dismissable">
    <button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
           {{session('success')}}
</div>
@endif


		<div class="panel panel-primary" ng-app="categoryApp1" ng-controller="categoryController1">
	         <div class="panel-heading">

	         ویرایش : <span style="color: red;">{{$slider->title}}</span>

            <a style="margin-right: 10px;vertical-align: middle;" 
               data-toggle="tooltip" data-placement="top"
            title="اضافه نمودن داسلایدر" href="{{route('slider.create')}}"
             class="pull-left btn btn-info"   
            >
            <i class="icon-plus"> </i>   
          </a>

            <a title="لیست اسلایدر" href="{{route('slider.index')}}"
            style="margin-right: 10px;vertical-align: middle;"
            class="pull-left btn btn-info"  data-toggle="tooltip" data-placement="top" >
            <i class="icon-list"> </i>   
           </a>
            <a title="حذف اسلایدر"  data-toggle="tooltip" data-placement="top"
            class="pull-left btn btn-danger" 
              data-toggle="tooltip" data-placement="top"
              onclick="del_row('{{$slider->id }}','{{ url('admin/slider')}}','{{ Session::token() }}')" 
              >
                  <i class="icon-trash"></i>
              </a>
            <i class="clearfix"></i>
	         </div>

	         <div class="panel-body" ng-app="categoryApp"  ng-controller ="categoryController">

               {!!Form::model($slider,['route'=>['slider.update',$slider->id],'files'=>'true','class'=>' form-horizontal','method'=>'PATCH','name'=>'categoryForm','novalidate'])!!}
      
                <div class="form-group {{($errors->has('title') ? 'has-error' :'')}}">
                  {!!Form::label('title','عنوان اسلایدر',['class'=>'control-label '])!!}
         
            
                <div class="col-md-12 ">
                {!!Form::text('title',null,['class'=>'form-control ','required',
                'ng-model'=>'title','ng-minlength'=>'3','ng-maxlength'=>'191'])!!}
                @if($errors->has('title'))
                 <span  class="help-block  ">{{$errors->first('title')}}</span>
                @endif 
              
              {{--  <div ng-if="submited" class="invalid"    >
                  <span ng-if="categoryForm.title_fa.$error.required">
                    پر کردن فیلد نام فارسی دسته الزامی است.
                  </span>
                  
                  <span ng-if="categoryForm.title_fa.$error.minlength">
                    تعداد کاراکتر نام دسته نباید کمتر از 3 باشد.
                  </span>
                  <span ng-if="categoryForm.title_fa.$error.maxlength">
                   تعداد کاراکتر نام دسته نباید بیشتر از 10 باشد.
                  </span>
                </div> --}}  
               </div>
                </div>
               
                  {{-- fild title-en --}}
             
  <div class="form-group {{($errors->has('url') ? 'has-error' :'')}}">
                {!!Form::label('url','آدرس اینترنتی اسلایدر',['class'=>'control-label '])!!}
                <div class="col-md-12 ">
                {!!Form::text('url',null,['class'=>'form-control ltr'
               ,'required',
                'ng-model'=>'url','ng-minlength'=>'3','ng-maxlength'=>'191'
                ])!!} 
                @if($errors->has('url'))
                 <span class="help-block">{{$errors->first('url')}}</span>
                @endif
              {{--   <div ng-if="submited" class="invalid"    >
             <span ng-if="categoryForm.title_en.$error.required">
                    پر کردن فیلد نام لاتین دسته الزامی است.
                  </span>  
                  
                  <span ng-if="categoryForm.title_en.$error.minlength">
                    تعداد کاراکتر نام دسته نباید کمتر از 3 باشد.
                  </span>
                  <span ng-if="categoryForm.title_en.$error.maxlength">
                   تعداد کاراکتر نام دسته نباید بیشتر از 10 باشد.
                  </span>
                </div>  --}} 
                </div>
                  
                </div>
      
             
                {!!Form::label('image','تصویر اسلایدر',['class'=>'control-label '])!!}
                  <div class="form-group {{($errors->has('image') ? 'has-error' :'')}}">
               <div class="col-md-4"></div>
                <div class="col-md-4 ">
                @if(empty($slider->image))
              <img onclick="select_file()" id="output" src="{{asset('images/1.jpg')}}" width="150px" height="150px;">
             
              @else
               <img onclick="select_file()" id="output" src="{{asset('upload/slider_image/'.$slider->image)}}" width="150px" height="150px;">
                <p >
                <span onclick="del_img('{{$slider->id }}','{{ url('admin/slider/del_img')}}','{{ Session::token() }}')" 

                style="  margin: 5px ; cursor: pointer;" class="btn btn-danger">
                حذف تصویر 
               </span></p>
              @endif
               <input type="file" accept='image/*' name="image"  onchange="load_file(event)" id="image" style="display: none;">
                @if($errors->has('image'))
                       <span class="help-block">{{$errors->first('image')}}</span>
                @endif
                
                </div>
                  
                </div>
                {{-- submit button --}}
              <div  class="form-group">
               
            <div class="col-md-12" >
              <input type="submit" value="ویرایش شو" name="send"  
                class="btn btn-primary"  ng-disabled="!categoryForm.$valid">
            </div>
                </div>
                  </div>
               {!!Form::close()!!}
	         </div>
@endsection

@section('footer')

<script type="text/javascript">


  select_file = function(){
    $("#image").click();
  }
    var load_file = function(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('output');
      output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
  };
</script>
 


@endsection



         

                

         
             
              

             
          
       

             
   

             

            
               
                
                

        
             