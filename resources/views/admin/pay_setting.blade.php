@extends('layouts.admin')

@section('title','تنظیمات پرداخت')
@section('header')
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-select.css')}}">
@endsection

@section('content')
<div class="box_div" style="padding-right: 15px;">
	<div class="my_title">
	<span>
		تنظیمات پرداخت
	</span>
</div>
 
{!! Form::open(array('url' => 'admin/setting/pay')) !!}
<div class="form-group">
<p style="color: red">تنظیمات اتصال به درگاه بانک ملت</p>
</div>
<div class="form-group">
	  {!! Form::label('TerminalId','ترمینال آدی بانک ملت') !!}
    {{  Form::text('TerminalId', $TerminalId,['class'=>'my_input']) }}
    
</div>

 <div class="form-group">
  {!! Form::label('UserName','نام کاربری') !!}
    {!! Form::text('UserName', $UserName,['class'=>'my_input']) !!}
     
 </div>

 <div class="form-group">
  {!! Form::label('Password','پسورد') !!}
    {!! Form::password('Password',['class'=>'my_input']) !!}
    
 </div>
<div class="form-group">
<p style="color: red">تنظیمات اتصال به درگاه زرین پال</p>
</div>
 <div class="form-group">
 	{!! Form::label('MerchantID','MerchantID') !!}
    {!! Form::text('MerchantID', $MerchantID,['class'=>'my_input']) !!}
     
 </div>
 
 

  <div class="form-group text-center">

     <input type="submit" class="btn btn-primary" value="ثبت کن" name="">
  </div>

{!! Form::close() !!}
</div>

 			 
				
@endsection

@section('footer')
<script type="text/javascript" src="{{asset('js/bootstrap-select.js')}}"></script>
<script type="text/javascript" src="{{asset('js/defaults-fa_IR.min.js')}}"></script>
@endsection