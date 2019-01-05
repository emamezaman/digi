@extends('layouts.admin')

@section('title','افزودن گارانتی')




@section('content')
<div class="panel panel-default">
<div class="panel-heading">
افزودن گارانتی
<a  title="لیست" class=" pull-left btn btn-info" style="cursor: pointer;margin-right: 5px; " href={{url('admin/service/?product_id='.$product->id)}}  data-toggle="tooltip" data-placement="top"
><i class="icon-list"></i></a>
<div class="clearfix"></div>
</div>
	<div class="panel-body">
		  {!!Form::open(['url'=>'admin/service?product_id='.$product->id,'name'=>'serviceForm'])!!}
		@if($errors->has('service_name'))
		<span  style="color: red">{{$errors->first('service_name')}}</span>
		@endif <br>
		<div class="input-group form-group col-md-8">
		<span class="input-group-addon">نام گارانتی</span> 
		<input type="text" class="form-control" name="service_name">
		</div><div class="clearfix"></div>
		<div class=" form-group col-md-5 ">
		<input type="submit" value="ذخیره کن" class="btn btn-primary" >
		</div>
		 {!!Form::close()!!}        
	</div>
</div>
@endsection



        
        
		
                    
		 
       
        



		 
 






 





 
		 
		 
			

