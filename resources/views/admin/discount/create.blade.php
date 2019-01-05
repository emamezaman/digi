@extends('layouts.admin')

@section('title')
افزودن کد تخفیف
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



		<div   class="panel panel-primary">

           <div class="panel-heading">
	         افزودن کد تخفیف
           <a title="لیست" href="{{url('admin/discount/order')}}"
             class="pull-left btn btn-info"  data-toggle="tooltip" data-placement="top"
            ><i class="icon-list"> </i>
            </a><i class="clearfix"></i>
	         </div>

      <div class="panel-body">
     {!! Form::open(['url'=>'admin/discount/order','method'=>'POST'])!!}
      @if($errors->has('code'))
      <span  style="color: red" >{{$errors->first('code')}}</span>
      @endif
      <div class="input-group form-group col-md-12">
      <span class="input-group-addon"  style="  width: 200px;">کد تخفیف</span>
      <input type="text" class="form-control" name="code">
      </div>

      @if($errors->has('value'))
      <span  style="color: red">{{$errors->first('value')}}</span>
      @endif
      <div class="input-group form-group col-md-12">
      <span class="input-group-addon" style="  width: 200px;">مقدار تخفیف برحسب درصد</span>
      <input type="text" class="form-control" name="value">
      </div>

       @if($errors->has('time_code'))
      <span  style="color: red">{{$errors->first('time_code')}}</span>
      @endif
      <div class="input-group form-group col-md-12">
      <span class="input-group-addon" style="width: 200px;">مدت زمان تخفیف برحسب ساعت</span>
      <input type="text" class="form-control" name="time_code">
      </div>

       <?php

       $price_list[0]="برای تمام سفارشات";
       $price_list[200000]="برای سفارش های بالای دویست هزار تومان";
       $price_list[500000]="برای سفارش های بالای پانصد هزار تومان";
       $price_list[1000000]="برای سفارش های بالای یک میلیون تومان";
       $price_list[2000000]="برای سفارش های بالای دو میلیون تومان";
       $price_list[3000000]="برای سفارش های بالای سه میلیون تومان";
       $price_list[4000000]="برای سفارش های بالای چهار میلیون تومان";
       $price_list[5000000]="برای سفارش های بالای پنج میلیون تومان";

       ?>
      <div class="form-group input-group col-md-12" >
      <span class="input-group-addon" style="  width: 200px;" >تخفیف برای</span>
      {!!Form::select('price',$price_list,null,['class'=>'selectpicker','data-live-search'=>'true'])!!}
      </div>

      <div  class="form-group col-md-12">
      <button class="btn btn-success" type="submit">ذخیره کن</button>
      </div>

      </div>

      {!!Form::close()!!}
      </div>
      @endsection

@section('footer')
<script type="text/javascript" src="{{asset('js/bootstrap-select.js')}}"></script>
<script type="text/javascript" src="{{asset('js/defaults-fa_IR.min.js')}}"></script><script type="text/javascript" src="{{asset('validatefile/additional-methods.min.js')}}"></script>
<script type="text/javascript" src="{{asset('validatefile/jquery.validate.min.js')}}"></script>
@endsection
