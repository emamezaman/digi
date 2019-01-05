@extends('layouts.admin')

@section('title','ویرایش محصول شگفت انگیز')

@section('header')
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-select.css')}}">
<style type="text/css">
	input[type=text],textArea{
		text-align: center;
	}
	.input-group-addon{width: 140px!important;}
</style>
@endsection
    

@section('content')
<div class="panel panel-primary">
	<div class="panel-heading">
		ویرایش محصول شگفت انگیز

		
            <a  title="لیست" class=" pull-left btn btn-info" style="cursor: pointer;margin-right: 5px; " href={{url('admin/amazing')}}  data-toggle="tooltip" data-placement="top"
            ><i class="icon-list"></i></a>
            

            <a title="اضافه نمودن پیشنهاد شگفت انگیز جیدد" href="{{url('admin/amazing/create')}}"
			class="pull-left btn btn-success"  data-toggle="tooltip" data-placement="top"><i class="icon-plus"> </i>  </a>
			<div class="clearfix">
				
			</div>
	</div>


	<div class="panel-body">

		  {!!Form::model($amazing,['url'=>'admin/amazing'.'/'.$amazing->id,'id'=>'AmazingForm','method'=>'PATCH' ])!!}
		   
        
        @if($errors->has('product_id'))
		<span  style="color: red" ">{{$errors->first('product_id')}}</span>
		@endif <br>
		<div class="input-group form-group col-md-9 ">
		<span class="input-group-addon" ">انتخاب محصول</span> 
		{!!Form::select('product_id',$product_list,null,['class'=>'selectpicker form-control','data-live-search'=>'true'])!!}
		</div>

		<div class="clearfix"></div>
		
                    
		 
       
        
		@if($errors->has('m_title'))
		<span  style="color: red" ">{{$errors->first('m_title')}}</span>
		@endif <br>

		<div class="input-group form-group col-md-8 ">
		<span class="input-group-addon" ">عنوانک</span> 
		{!!Form::text('m_title',null,['class'=>'form-control'])!!}
		 
		</div><div class="clearfix"></div>



		@if($errors->has('tozihat'))
		<span  style="color: red" ">{{$errors->first('tozihat')}}</span>
		@endif <br>
		<div class="input-group form-group col-md-8 ">
		<span class="input-group-addon" ">توضیحات محصول</span> 
		 {!! Form::textArea('tozihat',null,['class'=>'form-control','style'=>'height:150px;resize:none;'])!!}
		</div><div class="clearfix"></div>
 

		@if($errors->has('price1'))
		<span  style="color: red" ">{{$errors->first('price1')}}</span>
		@endif <br>
		<div class="input-group form-group col-md-5 ">
		<span class="input-group-addon" ">قیمت اصلی محصول</span> 
		{!!Form::text('price1',null,['class'=>'form-control','placeholder'=>"باعدد و به تومان"])!!}
		 
		</div><div class="clearfix"></div>


		@if($errors->has('price2'))
		<span  style="color: red" ">{{$errors->first('price2')}}</span>
		@endif <br>
		<div class=" input-group form-group col-md-5 ">
		<span class="input-group-addon" ">قیمت شگفت انگیز</span> 
         	{!!Form::text('price2',null,['class'=>'form-control','placeholder'=>"باعدد و به تومان"])!!}
		</div>
			<div class="clearfix"></div>

			@if($errors->has('time'))
		<span  style="color: red" ">{{$errors->first('time')}}</span>
		@endif <br>
		<div class=" input-group form-group col-md-6 ">
		<span class="input-group-addon" ">مدت زمان شگفت انگیز بودن</span> 
			{!!Form::text('time',null,['class'=>'form-control','placeholder'=>"بر حسب ساعت"])!!}
		</div>
			<div class="clearfix"></div>

		<div class=" form-group col-md-5 ">

		<input type="button" value="ویرایش کن"  id="btn_send" class="btn btn-primary" >
		</div>
		 {!!Form::close()!!}        



	</div>
</div>

 
@endsection

@section('footer')
<script type="text/javascript" src="{{asset('js/bootstrap-select.js')}}"></script>
<script type="text/javascript" src="{{asset('js/defaults-fa_IR.min.js')}}"></script>
<script type="text/javascript">
 $("#btn_send").click(function(event) {
		 
		$("#AmazingForm").submit();
 });
  
	 
</script>
@endsection



 
		 
		 
			

