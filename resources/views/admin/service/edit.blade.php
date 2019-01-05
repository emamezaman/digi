@extends('layouts.admin')

@section('title','افزودن گارانتی')




@section('content')
<div class="panel panel-default">
<div class="panel-heading">
ویرایش گارانتی - {{$service->service_name}}
<a  title="لیست" class=" pull-left btn btn-info" style="cursor: pointer;margin-right: 5px; " href={{url('admin/service/?product_id='.$service->product_id)}}  data-toggle="tooltip" data-placement="top"
><i class="icon-list"></i></a>
<div class="clearfix"></div>
</div>
	<div class="panel-body">
		@if(session()->has('message'))
        <p style="color: red">{{session('message')}}</p>
		@endif
		  {!!Form::model($service,['url'=>'admin/service/'.$service->id.'?product_id='.$service->product_id,'name'=>'serviceForm','method'=>'PUT'])!!}
		
		@if($errors->has('service_name'))
		<span  style="color: red" ">{{$errors->first('service_name')}}</span>
		@endif <br>
		<div class="input-group form-group col-md-8 ">
		<span class="input-group-addon" ">نام گارانتی</span> 
		{!!Form::text('service_name',null,['class'=>'form-control'])!!}
		</div><div class="clearfix"></div>
		<div class=" form-group col-md-5 ">
		<input type="submit" value="ویرایش کن" class="btn btn-primary" >
		</div>
		 {!!Form::close()!!}        
	</div>
</div>
@endsection



        
        
		
                    
		 
       
        



		 
 






 





 
		 
		 
			

