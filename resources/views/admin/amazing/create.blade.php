@extends('layouts.admin')

@section('title','افزودن محصول شگفت انگیز')

@section('header')
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-select.css')}}">
<style type="text/css">
	input[type=text],textArea{
		text-align: center;
	}
	.input-group-addon{width: 130px!important;}
</style>
@endsection


@section('content')
<div class="panel panel-primary">
	<div class="panel-heading">
		افزودن پیشنهاد شگفت انگیز
		 <a  title="لیست پیشنهاد شگفت انگیز" class=" pull-left btn btn-info" style="cursor: pointer;margin-right: 5px; " href={{url('admin/amazing')}}  data-toggle="tooltip" data-placement="top"
            ><i class="icon-list"></i></a>
            <div class="clearfix"></div>
	</div>
	<div class="panel-body">


		  {!!Form::open(['url'=>'admin/amazing','class'=>' form-horizontal','name'=>'amazingForm','novalidate'])!!}

        @if($errors->has('product_id'))
		<span  style="color: red">{{$errors->first('product_id')}}</span>
		@endif
		<div class="input-group form-group col-md-9">
		<span class="input-group-addon">انتخاب محصول</span>
		{!!Form::select('product_id',$product_list,null,['class'=>'selectpicker form-control','data-live-search'=>'true'])!!}
		</div>

		<div class="clearfix"></div>





		@if($errors->has('m_title'))
		<span  style="color: red">{{$errors->first('m_title')}}</span>
		@endif <br>
		<div class="input-group form-group col-md-8 ">
		<span class="input-group-addon" ">عنوانک</span>
		<input type="text" class="form-control" name="m_title">
		</div><div class="clearfix"></div>



		@if($errors->has('tozihat'))
		<span  style="color: red" ">{{$errors->first('tozihat')}}</span>
		@endif <br>
		<div class="input-group form-group col-md-8">
		<span class="input-group-addon">توضیحات محصول</span>
		 {!! Form::textArea('tozihat',null,['class'=>'form-control','style'=>'height:150px;resize:none;'])!!}
		</div><div class="clearfix"></div>


		@if($errors->has('price1'))
		<span  style="color: red">{{$errors->first('price1')}}</span>
		@endif <br>
		<div class="input-group form-group col-md-5">
		<span class="input-group-addon" >قیمت اصلی محصول</span>
		<input type="text" class="form-control" name="price1" placeholder="باعدد و به تومان">
		</div>
		<div class="clearfix"></div>


		@if($errors->has('price2'))
		<span  style="color: red">{{$errors->first('price2')}}</span>
		@endif <br>
		<div class=" input-group form-group col-md-5 ">
		<span class="input-group-addon">قیمت شگفت انگیز</span>
		<input type="text" class="form-control" name="price2" placeholder="باعدد و به تومان">
		</div>
			<div class="clearfix"></div>

			@if($errors->has('time'))
		<span  style="color: red" ">{{$errors->first('time')}}</span>
		@endif <br>
		<div class=" input-group form-group col-md-6 ">
		<span class="input-group-addon" ">مدت زمان شگفت انگیز بودن</span>
		<input type="text" class="form-control" name="time" placeholder="بر حسب ساعت">
		</div>
			<div class="clearfix"></div>


		<div class=" form-group col-md-5 ">
		<input type="submit" value="ذخیره کن" class="btn btn-primary" >
		</div>
		 {!!Form::close()!!}



	</div>
</div>


@endsection

@section('footer')
<script type="text/javascript" src="{{asset('js/bootstrap-select.js')}}"></script>
<script type="text/javascript" src="{{asset('js/defaults-fa_IR.min.js')}}"></script>
@endsection
