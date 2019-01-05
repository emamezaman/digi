@extends('layouts.admin')

@section('title')
افزودن دسته
@stop

@section('header')
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-select.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('validatefile/site-demos.css')}}">
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
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
    &times;
  </button>
{{session('success')}}
</div>
@endif

 
 
		<div ng-app="categoryApp"  ng-controller ="categoryController"  class="panel panel-primary">
	         <div class="panel-heading">
	         	افزودن دسته
            <a title="لیست دسته ها" href="{{route('category.index')}}"
             class="pull-left btn btn-info" 
             data-toggle="tooltip" data-placement="top"
            ><i class="icon-list"> </i> لیست </a>
            <i class="clearfix"></i>
	         </div>
	         {{-- 'files'=>true, --}}
	         <div class="panel-body">
               {!!Form::open(['route'=>'category.store','files'=>true,'class'=>' form-horizontal','name'=>'categoryForm','novalidate'])!!}
               {{-- ======================================================= --}}
         
                
               		 {{-- fild title fa --}}
           
         
            
               
             
                   @if($errors->has('title_fa'))
                 <span  style="color: red" ">{{$errors->first('title_fa')}}</span>
                @endif
            	<div class="input-group form-group col-md-12">
               <span class="input-group-addon" ">عنوان فارسی      </span> 
               <input type="text" class="form-control" name="title_fa">
              </div>
             
         {{--     <div ng-if="submited" class="invalid"    >
                  <span ng-if="categoryForm.title_fa.$error.required">
                    پر کردن فیلد نام فارسی دسته الزامی است.
                  </span>
                  
                  <span ng-if="categoryForm.title_fa.$error.minlength">
                    تعداد کاراکتر نام دسته نباید کمتر از 3 باشد.
                  </span>
                  <span ng-if="categoryForm.title_fa.$error.maxlength">
                   تعداد کاراکتر نام دسته نباید بیشتر از 10 باشد.
                  </span>
               

                </div>  --}}
                

              
         
             
               		{{-- fild title-en --}}
 
   @if($errors->has('title_en'))
                 <span style="color: red">{{$errors->first('title_en')}}</span>
                @endif
                  <div class="input-group form-group col-md-12">
               <span class="input-group-addon" >عنوان لاتین   </span> 
               <input type="text" class="form-control" name="title_en">
              </div>  
           
              
              

      
                {{-- fild parent-id --}}
                @if($errors->has('parent_id'))
                       <span class="help-block">{{$errors->first('parent_id')}}</span>
                @endif
               		<div class="form-group input-group col-md-12" >
                    <span class="input-group-addon" >انتخاب سر دسته</span>
                  {!!Form::select('parent_id',$cat_list,null,['class'=>'selectpicker','required','data-live-search'=>'true'])!!}
                </div>
                
               
               <div class="clearfix"></div>
                  
                  
             
             
          
                  <div class="form-group {{($errors->has('image') ? 'has-error' :'')}}">
               <div class="col-md-4"></div>
               	<div class="col-md-4 ">
                 
              <img onclick="select_file()" id="output" src="{{asset('images/1.jpg')}}" width="100px" height="100px;">
               <input type="file" accept='image/*' name="image"  onchange="load_file(event)" id="image" style="display: none;">
               	@if($errors->has('image'))
                       <span class="help-block">{{$errors->first('image')}}</span>
               	@endif
                
               	</div>
               		
               	</div>
                
               	{{-- submit button --}}
              <div  class="form-group col-md-12">
                  
                  <button class="btn btn-primary" type="submit">ذخیره کن</button>
          
               	</div>
       

                  </div>
               {!!Form::close()!!}
	         </div>

@endsection
                    
               






@section('footer')
<script type="text/javascript" src="{{asset('js/bootstrap-select.js')}}"></script>
<script type="text/javascript" src="{{asset('js/defaults-fa_IR.min.js')}}"></script><script type="text/javascript" src="{{asset('validatefile/additional-methods.min.js')}}"></script>
<script type="text/javascript" src="{{asset('validatefile/jquery.validate.min.js')}}"></script>
 
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
 
 
 

                 

                