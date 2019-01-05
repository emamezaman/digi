@extends('layouts.admin') @section('title','افزودن محصول') @section('header')
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-select.css')}}"> @endsection @section('content') @if(session()->has('warning'))
<div class="alert alert-warning alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
		&times;
	</button> {{session('warning')}}
</div>
@endif


<div class="panel panel-primary">
    <div class="panel-heading">
        افزودن محصول
        <a title="لیست محصولات" href="{{route('product.index')}}" class="pull-left btn btn-info"><i class="icon-list"> </i>  </a>
        <i class="clearfix"></i>
    </div>

    <div class="panel-body">
        {!!Form::open(['route'=>'product.store','files'=>true,'class'=>' form-horizontal'])!!} {{-- fild title fa --}}
      
        <div class="form-group  ">
            {!!Form::label('title','عنوان محصول',['class'=>'control-label col-md-2 '])!!}
            <div class="col-md-9 ">
                {!!Form::text('title',null,['class'=>'form-control'])!!} @if($errors->has('title'))
                <span style="color: red" class="help-block">{{$errors->first('title')}}</span> @endif
            </div>
        </div>


        <div class="form-group ">

            <div class="col-md-11 ">
                {!!Form::textArea('text',null,['row'=>'5','class'=>'form-control ckeditor','style'=>'resize:none;'])!!} @if($errors->has('text'))
                <span style="color: red" class="help-block">{{$errors->first('text')}}</span> @endif
            </div>
        </div>

        <div class="form-group">
            {!!Form::label('cat','انتخاب سر دسته ',['class'=>'control-label col-md-2'])!!}
            <div class="col-md-9 ">
                {!!Form::select('cat[]',$cat_list,null,['class'=>'selectpicker','required','data-live-search'=>'true','multiple'=>'multiple'])!!} @if($errors->has('cat'))
                <span style="color: red" class="help-block">{{$errors->first('cat')}}</span> @endif

            </div>
        </div>


        <div class="form-group  ">
            {!!Form::label('code','عنوان لاتین محصول',['class'=>'control-label col-md-2 '])!!}
            <div class="col-md-9 ">
                {!!Form::text('code',null,['class'=>'form-control text-left'])!!} @if($errors->has('code'))
                <span style="color: red" class="help-block">{{$errors->first('code')}}</span> @endif
            </div>
        </div>


        <div class="form-group  ">
            {!!Form::label('price','هزینه محصول',['class'=>'control-label col-md-2 '])!!}
            <div class="col-md-9 ">
                {!!Form::text('price',null,['placeholder'=>'با عدد و به تومن وارد نمائید','class'=>'form-control text-center'])!!} @if($errors->has('price'))
                <span style="color: red" class="help-block">{{$errors->first('price')}}</span> @endif
            </div>
        </div>

        <div class="form-group  ">
            {!!Form::label('discounts','تخفیف',['class'=>'control-label col-md-2 '])!!}
            <div class="col-md-9 ">
                {!!Form::text('discounts',null,['placeholder'=>'با عدد و به تومن وارد نمائید','class'=>'form-control text-center'])!!} @if($errors->has('discounts'))
                <span style="color: red" class="help-block">{{$errors->first('discounts')}}</span> @endif
            </div>
        </div>

        <div class="form-group  ">
            {!!Form::label('product_number','تعداد محصول',['class'=>'control-label col-md-2 '])!!}
            <div class="col-md-9 ">
                {!!Form::text('product_number',null,['placeholder'=>'با عدد وارد نمائید','class'=>'form-control text-center'])!!} @if($errors->has('product_number'))
                <span style="color: red" class="help-block">{{$errors->first('product_number')}}</span> @endif
            </div>
        </div>

        <div class="form-group  ">
            {!!Form::label('bon','تعداد بن خرید محصول',['class'=>'control-label col-md-2 '])!!}
            <div class="col-md-9 ">
                {!!Form::text('bon',null,['placeholder'=>'با عدد وارد نمائید','class'=>'form-control text-center'])!!} @if($errors->has('bon'))
                <span style="color: red" class="help-block">{{$errors->first('bon')}}</span> @endif
            </div>
        </div>
        {{-- ================================== --}}
        <div class="form-group  ">
            {!!Form::label('product_status','وضعیت محصول',['class'=>'control-label col-md-2 '])!!}
            <div class="col-md-9 ">
                {!!Form::checkbox('product_status','1','true',['class'=>'vertical-middle'])!!}
                <span style="margin:2px 4px 0px 0;">موجود</span> @if($errors->has('product_status')) --}}
                <span style="color: red" class="help-block">{{$errors->first('product_status')}}</span> @endif
            </div>
        </div>
        <div class="form-group  ">
            {!!Form::label('show_product','وضعیت نمایش',['class'=>'control-label col-md-2 '])!!}
            <div class="col-md-9 ">
                {!!Form::checkbox('show_product','1','true',['class'=>'vertical-middle'])!!}
                <span style="margin:2px 4px 0px 0;">نمایش</span> @if($errors->has('show_product'))
                <span style="color: red" class="help-block">{{$errors->first('show_product')}}</span> @endif
            </div>
        </div>
        {{-- ============================ --}}
        <div class="form-group  ">
            {!!Form::label('special','پیشنهاده ویژه ',['class'=>'control-label col-md-2 '])!!}
            <div class="col-md-9 ">
                {!!Form::checkbox('special','1','true',['class'=>'vertical-middle'])!!}
                <span class="vertical-middle" style="margin:2px 4px 0px 0;">ویژه</span> @if($errors->has('special'))
                <span style="color: red" class="help-block">{{$errors->first('special')}}</span> @endif
            </div>
        </div>
        {{-- ============================== --}}
        <div class="form-group  ">
            <label class="control-label ">انتخاب رنگ</label><br><br>
            <div class=" ">
                 <input style="margin-right: 20px;" type="text" class=" color_input_name my_input " name="color_name[]">
                <input type="text" class="jscolor color_input_code  my_input " name="color_code[]">
               
        
            <span style="margin-right:10px;color:red;cursor: pointer;" onclick="add_color()" title="افزودن رنگ بیشتر"><i class="icon-plus"></i></span> 
               
   
               

            </div>
        </div>
        <div id="color_box">

        </div>
        
        <div class="form-group  ">
            <label class="control-label col-md-2">افزودن برچسب</label>
            <div class="col-md-8  ">
          <input type="text" id="taglist" class="form-control "   name="taglist"  >
          <input type="hidden" id="keyword"  class="form-control"  name="keyword"  >
          
              <div   id="tag_box">
                  
              </div>
           </div>
              <div class="col-md-1">
              	  <span onclick="tag_list()" class="btn btn-success">افزودن</span>
              </div>
        </div>
        {{-- ============================== --}}
      
        <div class="form-group ">
   {!!form::label('description','توضیحات محصول',['class'=>'control-label col-md-2'])!!}
            <div class="col-md-10 ">
                {!!Form::textArea('description',null,['row'=>'5','class'=>'form-control ','style'=>'resize:none;'])!!} @if($errors->has('description'))
                <span style="color: red" class="help-block">{{$errors->first('description')}}</span> @endif
            </div>
        </div>

<div id="ff"></div>
        <div class="form-group">
            <div class="col-md-12">
                {!!Form::submit('ذخیره شو',['class'=>'btn btn-success'])!!}
            </div>
        </div>
        {!!Form::close()!!}
    </div>
</div>


 


@endsection {{-- submit button --}} @section('footer') {{-- bootstrap-select --}}
<script type="text/javascript" src="{{asset('js/bootstrap-select.js')}}"></script>
<script type="text/javascript" src="{{asset('js/defaults-fa_IR.min.js')}}"></script>
{{-- script ckeditor --}}
<script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jscolor.js')}}"></script>


@endsection
    
 
