@extends('layouts.admin')

@section('title','افزودن کاربر  ')
@section('header')
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-select.css')}}">
@endsection

@section('content')
<div class="box_div">
	<div class="my_title">
	<span>
		افزودن کاربر
	</span>
</div>
@if(Session::has('message'))
<p style="margin-right: 20px;
margin-left: 20px;" class="alert alert-warning">
  {{ Session::get('message') }}
</p>
@endif
{!! Form::open(array('url' => 'admin/user')) !!}

<div class="form-group">
	{!! Form::label('usernmae','نام کاربری') !!}
    {!! Form::text('username',null,['class'=>'my_input']) !!}
    @if($errors->has('username'))
    <br><span class="red">{{ $errors->first('username') }}</span>
    @endif
</div>

 <div class="form-group">
 	{!! Form::label('usernmae','گذر واژه') !!}
    {!! Form::text('password',null,['class'=>'my_input']) !!}
     @if($errors->has('password'))
    <br><span class="red">{{ $errors->first('password') }}</span>
    @endif
 </div>
 
 <div class="form-group">
 	{!! Form::label('role','نقش کاربر') !!}
    {!! Form::select('role',array('admin'=>'مدیر','user'=>'کاربر عادی'),null,['class'=>'selectpicker']) !!}
 </div>

  <div class="form-group">
     <input type="submit" class="btn btn-primary" value="ثبت کن" name="">
  </div>

{!! Form::close() !!}
</div>

 			 
				
@endsection

@section('footer')
<script type="text/javascript" src="{{asset('js/bootstrap-select.js')}}"></script>
<script type="text/javascript" src="{{asset('js/defaults-fa_IR.min.js')}}"></script>
@endsection