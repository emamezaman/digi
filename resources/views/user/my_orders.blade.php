@extends('layouts.user')

@section('user')
<?php use App\lib\JDF; ?>
<table class="table table-bordered table-striped table-hover" style="margin-top: 20px;">
	<tr>
		<th>ردیف</th>
		<th>شماره</th>
		<th>تاریخ</th>
		<th>مبلغ کل</th>
		<th>عملیات پرداخت</th>
		<th>جزئیات</th>
	</tr>
	@foreach ($orders as $key => $order)
		<tr>
			<td>
				{{++$key}}
			</td>
			<td style="color: skyblue">
				{{$order->order_code}}
			</td>
			<td>
				<?php $jdf= new JDF(); ?>
				{{$jdf->jdate('Y/m/d - H:i:s',$order->time)}}
			</td>
			<td>
				<span style="color: green">{{number_format($order->price)}}</span>
				<span style="color: green;padding-right: 5px;">تومان</span>
			</td>
			<td>
				@if($order->pay_status==1)
				<span style="color: green">پرداخت شده</span>
				@else
				<span style="color: red">درانتظار پرداخت</span>
				@endif
			</td>
			<td>
				<a href="{{url('user/order?id='.$order->id)}}"><i class="fa fa-eye"></i></a>
			</td>
		</tr>
	@endforeach
</table>
{{$orders->links()}}
@stop