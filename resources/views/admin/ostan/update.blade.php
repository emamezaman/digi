@extends('layouts.admin')

@section('title')
ویرایش نام  استان
@stop

@section('content')


		<div class="panel panel-default">
          <div class="panel-heading">
           ویرایش  - {{ $ostan->ostan_name }}
           <a href="{{url('admin/ostan/create')}}" class="btn btn-success pull-left" title="جدید">
      <i class="icon-plus"></i>
  </a>
         <i class="clearfix"></i>
          </div>
           <div class="panel-body">
               {!!Form::model($ostan,['url'=>'admin/ostan'.'/'.$ostan->id,'method'=>'PUT'])!!}
					@if($errors->has('ostan_name'))
					<span  style="color:red">{{$errors->first('ostan_name')}}</span>
					@endif
            	<div class="form-group input-group">
                 <span class="input-group-addon">استان</span>
                 {!! Form::text('ostan_name',null,['class'=>"form-control"]) !!} 
               
              </div>
              <div class="form-group">
              	<input type="submit" value="ویرایش کن" class="btn btn-primary" name="">
              </div>
               {!!Form::close()!!}
           </div>

		</div>

@stop