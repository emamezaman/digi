@extends('layouts.admin')

@section('title','ویرایش')
@section('header')
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-select.css')}}">
@endsection

@section('content')
<div class="box_div">
	<div class="my_title">
	<span>
		ویرایش - {{ $user->username }}
	</span>
</div>

@if(Session::has('success'))
<p id="success" style="margin-right: 20px; 
margin-left: 20px;" class="alert alert-success" onclick="msg_hide('success')">
	{{ Session::get('success') }}
</p>
@endif

@if(Session::has('error'))
<p  id="error" onclick="msg_hide('error')" style="margin-right: 20px;
margin-left: 20px;" class="alert alert-danger">
	{{ Session::get('error') }}
</p>
@endif

{!! Form::model($user,array('url' => 'admin/user'.'/'.$user->id)) !!}
{{ method_field('PATCH') }}
<div class="form-group">
	{!! Form::label('usernmae','نام کاربری') !!}
    {!! Form::text('username',null,['class'=>'my_input']) !!}
    @if($errors->has('username'))
    <br><span class="red">{{ $errors->first('username') }}</span>
    @endif
</div>

 <div class="form-group">
 	{!! Form::label('usernmae','گذر واژه') !!}
    {!! Form::password('password',['class'=>'my_input']) !!}
     @if($errors->has('password'))
    <br><span class="red">{{ $errors->first('password') }}</span>
    @endif
 </div>

 <div class="form-group">
 	{!! Form::label('usernmae','نقش کاربر') !!}
    {!! Form::select('role',array('admin'=>'مدیر','user'=>'کاربر عادی'),null,['class'=>'selectpicker']) !!}
 </div>

  <div class="form-group">
     <input type="submit" class="btn btn-primary" value="ویرایش کن" name="">
  </div>

{!! Form::close() !!}
</div>

 			 
				
@endsection

@section('footer')
<script type="text/javascript">

	
	$(document).ready(function() {
			function msg_hide(id){
		$("#"+ id).fadeOut('slow');
		
	}
	
	});
	
</script>
<script type="text/javascript" src="{{asset('js/bootstrap-select.js')}}"></script>
<script type="text/javascript" src="{{asset('js/defaults-fa_IR.min.js')}}"></script>

@endsection