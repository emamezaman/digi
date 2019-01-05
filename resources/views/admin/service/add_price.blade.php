<form method="post" action="{{url('admin/service/set_price?product_id='.$product_id)}}" style="width: 50%">
{{csrf_field()}}
<input type="hidden" name="date" value="{{$date}}">
<input type="hidden" name="service_id" value="{{$service_id}}">
@if($product_color->count() >0)
@foreach($product_color as $key=>$value)
<?php $price = '';
if(array_key_exists($value->id, $service_price))
{
	$price = $service_price[$value->id];
}
?>
<div class="form-group input-group">
	<span class="input-group-addon">{{$value->title}}</span>
	<input type="text" class="form-control" value="{{$price}}" name="color[{{$value->id}}]" placeholder="هزینه را با عدد و بر حسب تومان وارد کنید ">
</div>
@endforeach
@endif

@if($product_color->count() == 0)
<div class="form-group input-group">
	<span class="input-group-addon">بدون رنگ</span>
	<input type="text" class="form-control" name="color[0]" placeholder="هزینه را با عدد و بر حسب تومان وارد کنید ">
</div>
 @endif
<div class="form-group ">
	<input type="submit" value="ثبت کن" class="btn btn-primary">
</div>
</form>


