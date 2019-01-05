@extends('layouts.admin')

@section('title')
ویرایش نام شهر
@stop

@section('header')
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-select.css')}}">

@stop

@section('content')


		<div class="panel panel-default">
          <div class="panel-heading">
            ویرایش -  {{$shar->shar_name}}
          </div>
           <div class="panel-body">
               {!!Form::model($shar,['url'=>'admin/shar'.'/'. $shar->id ,'method'=>'PUT'])!!}
               
            
                   
                   
					@if($errors->has('shar_name'))
					<span  style="color:red">{{$errors->first('shar_name')}}</span>
					@endif
            	<div class="form-group input-group">
                 <span class="input-group-addon">نام شهر</span> 
                 {!!Form::text('shar_name',null,['class'=>'form-control'])!!}
                
              </div>
              
                 <div class="form-group input-group">
            @if($errors->has('ostan_id'))
					<span  style="color:red">{{$errors->first('ostan_id')}}</span>
					@endif
                <span class="input-group-addon">استان</span>
                {!!Form::select('ostan_id',$ostans,null,['class'=>'selectpicker','data-live-search'=>'true'])!!} 
                </div>
                

          
              <div class="form-group">
              	<input type="submit" value="ویرایش کن" class="btn btn-primary" name="">
              </div>
               {!!Form::close()!!}
           </div>

		</div>

@stop


@section('footer')

<script type="text/javascript" src="{{asset('js/bootstrap-select.js')}}"></script>
<script type="text/javascript" src="{{asset('js/defaults-fa_IR.min.js')}}">


@stop