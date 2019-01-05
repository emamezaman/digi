@extends('layouts.admin')

@section('title')
افزودن کارت هدیه
@stop

@section('header')
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-select.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('validatefile/site-demos.css')}}">
<link rel="stylesheet" href="{{url('css/jspc-gray.css')}}">
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
	       افزودن کارت هدیه
           <a title="لیست" href="{{url('admin/ gift_cart/order')}}"
             class="pull-left btn btn-info"  data-toggle="tooltip" data-placement="top"
            ><i class="icon-list"> </i>
            </a><i class="clearfix"></i>
	         </div>

      <div class="panel-body">
     {!! Form::open(['url'=>'admin/gift_cart/order','method'=>'POST'])!!}

      @if($errors->has('user_id'))
      <span  style="color: red;margin-right: 17px;">{{$errors->first('user_id')}}</span>
      @endif
     <div class="form-group input-group col-md-12" >
      <span class="input-group-addon" style="  width: 200px;" >انتخاب کاربر</span>
      {!!Form::select('user_id',$user_list,null,['class'=>'selectpicker','data-live-search'=>'true'])!!}
      </div>

      @if($errors->has('value'))
      <span  style="color: red;margin-right: 17px;">{{$errors->first('value')}}</span>
      @endif
      <div class="input-group form-group col-md-12">
      <span class="input-group-addon" style="  width: 200px;">قیمت کارت برحسب تومان</span>
      <input type="text" class="form-control" name="value" value="old('value')">
      </div>

       @if($errors->has('date'))
      <span  style="color: red; margin-right: 17px;">{{$errors->first('date')}}</span>
      @endif
      <div class="input-group form-group col-md-12">
      <span class="input-group-addon" style="width: 200px;">اعتبار کارت تا تاریخ</span>
      <input type="text" class="form-control pdate" value="old('date')" name="date" id="date1" style="width: 96%!important;" >
      </div>

      <div  class="form-group col-md-12">
      <button class="btn btn-success" type="submit">کارت بساز</button>
      </div>
    

      </div>

      {!!Form::close()!!}
      </div>
      @endsection

@section('footer')
<script type="text/javascript" src="{{asset('js/bootstrap-select.js')}}"></script>
<script type="text/javascript" src="{{asset('js/defaults-fa_IR.min.js')}}"></script>
<script type="text/javascript" src="{{asset('validatefile/additional-methods.min.js')}}"></script>
<script type="text/javascript" src="{{asset('validatefile/jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/js-persian-cal.min.js')}}"></script>
<script type="text/javascript">
var date1 = new AMIB.persianCalendar( 'date1');
</script>
@endsection
