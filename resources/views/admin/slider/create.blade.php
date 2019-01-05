@extends('layouts.admin')

@section('title')
افزودن اسلایدر
@stop

@section('header')

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
	         	افزودن اسلایدر
            <a title="لیست دسته ها" href="{{route('slider.index')}}"
             class="pull-left btn btn-info" 
             data-toggle="tooltip" data-placement="top"
            ><i class="icon-list"> </i>  </a>
            <i class="clearfix"></i>
	         </div>
	         {{-- 'files'=>true, --}}
	         <div class="panel-body">
               {!!Form::open(['route'=>'slider.store','files'=>true,'class'=>' form-horizontal','name'=>'sliderForm1','novalidate'])!!}
               {{-- ======================================================= --}}
         
                
               		 {{-- fild title fa --}}
               	<div class="form-group {{($errors->has('title') ? 'has-error' :'')}}">
          	{!!Form::label('title','عنوان اسلایدر',['class'=>'control-label '])!!}
               	<div class="col-md-12 ">
               	{!!Form::text('title',null,['class'=>'form-control ','requiredw',
                'ng-modelq'=>'title','ng-minlength'=>'3','ng-maxlength'=>'191'])!!}
               	@if($errors->has('title'))
                 <span  class="help-block  ">{{$errors->first('title')}}</span>
               	@endif 
         
            
            	
        {{--      <div ng-if="submited" class="invalid"    >
                  <span ng-if="sliderForm.title.$error.required">
                    پر کردن فیلد عنوان اسلایدر الزامی است.
                  </span>
                  
                  <span ng-if="sliderForm.title.$error.minlength">
                    تعداد کاراکتر عنوان اسلایدر نباید کمتر از 3 باشد.
                  </span>
                  <span ng-if="sliderForm.title.$error.maxlength">
                   تعداد کاراکتر عنوان اسلایدر نباید بیشتر از 191 باشد.
                  </span>
               

                </div> --}} 
                

               	</div>
               </div>
         
             
               		{{-- fild title-en --}}
             
  <div class="form-group {{($errors->has('url') ? 'has-error' :'')}}">
               	{!!Form::label('url','مسیر اسلایدر',['class'=>'control-label '])!!}
               	<div class="col-md-12 ">
               	{!!Form::text('url',null,['class'=>'form-control ltr'
               ,'requiredw',
                'ng-modelq'=>'url','ng-minlength'=>'3','ng-maxlength'=>'191'
                ])!!}	
               	@if($errors->has('url'))
                 <span class="help-block">{{$errors->first('url')}}</span>
               	@endif
             {{--     <div ng-if="submited" class="invalid"    >
             <span ng-if="sliderForm.url.$error.required">
                    پر کردن مسیر اسلایدر الزامی است.
                  </span>  
                  
                  <span ng-if="sliderForm.url.$error.minlength">
                    تعداد کاراکتر مسیر اسلایدر نباید کمتر از 3 باشد.
                  </span>
                  <span ng-if="sliderForm.url.$error.maxlength">
                   تعداد کاراکتر مسیر اسلایدر نباید بیشتر از 191 باشد.
                  </span>
                </div> --}}  
               	</div>
               		
               	</div>
              

             
          
               	{!!Form::label('image','انتخاب تصویر',['class'=>'control-label '])!!}
                  <div class="form-group {{($errors->has('image') ? 'has-error' :'')}}">
               <div class="col-md-4"></div>
               	<div class="col-md-4 ">
                 
              <img onclick="select_file()" id="output" src="{{asset('images/1.jpg')}}" width="150px" height="150px;">
               <input type="file" accept='image/*' name="image"  onchange="load_file(event)" id="image" style="display: none;">
               	@if($errors->has('image'))
                       <span class="help-block">{{$errors->first('image')}}</span>
               	@endif
                
               	</div>
               		
               	</div>
                
               	{{-- submit button --}}
              <div  class="form-group">
               
            <div class="col-md-12" >
              <input type="submit" value="ذخیره شو" name="send"  
                class="btn btn-success"  ng-disableds="!sliderForm.$valid1">
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
 
 
 

                 

                