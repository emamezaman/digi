


@extends('layouts.admin')

@section('title','ویرایش دسته')

@section('header')
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-select.css')}}">
@endsection

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

	         ویرایش : <span style="color: red;">{{$category->title_fa}}</span>

            <a style="margin-right: 10px;vertical-align: middle;" 
               data-toggle="tooltip" data-placement="top"
            title="اضافه نمودن دسته جدید" href="{{route('category.create')}}"
             class="pull-left btn btn-info"   
            >
            <i class="icon-plus"> </i>   
          </a>

            <a title="لیست دسته ها" href="{{route('category.index')}}"
            style="margin-right: 10px;vertical-align: middle;"
            class="pull-left btn btn-info"  data-toggle="tooltip" data-placement="top" >
            <i class="icon-list"> </i>   
           </a>
            <a title="حذف دسته"  data-toggle="tooltip" data-placement="top"
            class="pull-left btn btn-danger" 
              data-toggle="tooltip" data-placement="top"
              onclick="del_row('{{$category->id }}','{{ url('admin/category')}}','{{ Session::token() }}')" 
              >
                  <i class="icon-trash"></i>
              </a>
            <i class="clearfix"></i>
	         </div>
          <a  href="{{url('admin/category/?page=2')}}">back</a>
	         <div class="panel-body" ng-app="categoryApp"  ng-controller ="categoryController">

               {!!Form::model($category,['route'=>['category.update',$category->id],'files'=>'true','class'=>' form-horizontal','method'=>'PATCH','name'=>'categoryForm','novalidate'])!!}
      
                <div class="form-group {{($errors->has('title_fa') ? 'has-error' :'')}}">
                  {!!Form::label('title_fa','عنوان فارسی دسته',['class'=>'control-label '])!!}
         
            
                <div class="col-md-12 ">
                {!!Form::text('title_fa',null,['class'=>'form-control ','required',
                'ng-model'=>'title','ng-minlength'=>'3','ng-maxlength'=>'191'])!!}
                @if($errors->has('title_fa'))
                 <span  class="help-block  ">{{$errors->first('title_fa')}}</span>
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
             
  <div class="form-group {{($errors->has('title_en') ? 'has-error' :'')}}">
                {!!Form::label('title_en','عنوان انگلیسی دسته',['class'=>'control-label '])!!}
                <div class="col-md-12 ">
                {!!Form::text('title_en',null,['class'=>'form-control ltr'
               ,'required',
                'ng-model'=>'title_en','ng-minlength'=>'3','ng-maxlength'=>'191'
                ])!!} 
                @if($errors->has('title_en'))
                 <span class="help-block">{{$errors->first('title_en')}}</span>
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
      
                {{-- fild parent-id --}}
                  <div class="form-group">
                {!!Form::label('parent_id','انتخاب دسته پدر',['class'=>'control-label '])!!}
                <div class="col-md-12 ">
                  {!!Form::select('parent_id',$cat_list,null,['class'=>'selectpicker',
                  'data-live-search'=>'true'])!!}
                
               {{--      <div ng-if="submited" class="invalid"    >
                  <span ng-if="categoryForm.parent_id.$error.required">
                    انتخاب گزینه ای الزامی است.
                  </span>
                </div> --}}
                </div>
                </div>
                {!!Form::label('image','دسته تصویر',['class'=>'control-label '])!!}
                  <div class="form-group {{($errors->has('image') ? 'has-error' :'')}}">
               <div class="col-md-4"></div>
                <div class="col-md-4 ">
                @if(empty($category->image))
              <img onclick="select_file()" id="output" src="{{asset('images/1.jpg')}}" width="150px" height="150px;">
              @else
               <img onclick="select_file()" id="output" src="{{asset('upload/category_image/'.$category->image)}}" width="150px" height="150px;">
               <p >
                <span onclick="del_img('{{$category->id }}','{{ url('admin/category/del_img')}}','{{ Session::token() }}')" 

                style="  margin-top: 5px; cursor: pointer;" class="btn btn-danger">
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
<script type="text/javascript" src="{{asset('js/bootstrap-select.js')}}"></script>
<script type="text/javascript" src="{{asset('js/defaults-fa_IR.min.js')}}"></script>
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



         

                

         
             
              

             
          
       

             
   

             

            
               
                
                

        
             