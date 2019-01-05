@extends('layouts.admin')

@section('title','مدریت گارانتی محصول')

@section('header')
<link rel="stylesheet" href="{{url('css/jspc-gray.css')}}">
@endsection

@section('content')
<div class="panel panel-default">
<div class="panel-heading">
مدریت گارانتی محصول - {{$product->title}} - گارانتی -
  {{$service->service_name}}
</div>
	<div class="panel-body">
	<table class="table table-hover table-striped">
	    <thead>
      <tr>
            <th>ردیف</th>
	        <th>تاریخ</th>
	    <th>رنگ</th>
	    <th>قیمت</th>
      </tr>
	    </thead>
	    <tbody>
	            @foreach($service->get_service as $key=>$value)
	        <tr>
	            <td>{{++$key}}</td>
	            <td>{{$value->date}}</td>
	            <td>
	            <span style="background:#{{$value->get_color->code}}; ;border-radius:5px;display:inline-block;padding:5px;
                height:20px;width:20px;border:1px solid grey;
                ">
	                
	            </span>
	            </td>
	            <td>{{$value->price}}</td>
	        </tr>
	            @endforeach
	    </tbody>
	</table>
	<hr>
		<div class="form-group input-group">
			<span class="input-group-addon">انتخاب تاریخ</span>
			<input type="text" id="pcal4" class="pdate form-control" style="display: inline-block;width: 50%;">
		</div>
		<div id="show"></div>
	</div>	       
</div>
@endsection



@section('footer')
<?php 
$url = url('admin/service/get_price?product_id='.$product->id);
?>
<script type="text/javascript" src="{{url('js/js-persian-cal.min.js')}}"></script>
<script type="text/javascript">
	var objCal4 = new AMIB.persianCalendar( 'pcal4', {
				onchange: function( pdate ){
					if( pdate ) {
						var date =  pdate.join( '-' ) ;
						alert(date);
						var product_id = {{$product->id}};
						var service_id = {{$service->id}};
						 $.ajax({
						    url:'{{$url}}',
						    type:'POST',
						    data:{date:date,product_id:product_id,service_id:service_id,_token:'{{csrf_token()}}'},
						    success:function(r){
						     $("#show").html(r);

						}
						});
					} else {
						alert( 'تاریخ واردشده نادرست است' );
					}
				}
			}
		);
</script>
@endsection


  







        
        
		
                    
		 
       
        



		 
 






 





 
		 
		 
			

