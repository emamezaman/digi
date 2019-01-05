@extends('layouts.admin')

@section('title')
افزودن   استان
@stop

@section('content')


		<div class="panel panel-default">
          <div class="panel-heading">
            افزودن   استان
          </div>
           <div class="panel-body">
               {!!Form::open(['url'=>'admin/ostan'])!!}
					@if($errors->has('ostan_name'))
					<span  style="color:red">{{$errors->first('ostan_name')}}</span>
					@endif
            	<div class="form-group input-group">
                 <span class="input-group-addon">نام استان</span> 
                 <input type="text" class="form-control" name="ostan_name">
              </div>
              <div class="form-group">
              	<input type="submit" value="ذخیره کن" class="btn btn-primary" name="">
              </div>
               {!!Form::close()!!}
           </div>

		</div>

@stop