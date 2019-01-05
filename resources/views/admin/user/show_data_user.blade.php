@extends('layouts.admin')

@section('title',$user->username)

@section('content')

<div class="panel">
	<div class="panel-heading">
               مشاهده کاربر - {{ $user->username }}
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-bordered table-striped text-center">
				<thead>
					<tr>
					 
					</tr>
				</thead>
				<tbody>
				 
					<tr>
						<th>نام کاربری </th>
						<td>{{ $user->username }}</td>
					</tr>
					<tr>
						<th>تاریخ عضویت  </th>
						<?php 
						$d= explode(' ', $user->created_at);
						$d = explode('-', $d[0]);
						 $jdf = new App\lib\JDF;
						 
						 $d = $jdf->gregorian_to_jalali($d[0],$d[1],$d[2],'-');
						 
						?>
						<td>{{ $d }}</td>
					</tr>
						
					<tr>
					<th>نقش کاربر</th>
							<td>
							@if($user->role=='admin')
                              مدیر
                              @else
							کاربر عادی
							  @endif
						</td>
					</tr>	
				 <tr>
				 	<td>جمع کل خرید</td>
				 	<td>{{ $price }}</td>
				 </tr>
				</tbody>
			</table>
		</div>
		<p></p>
		<p></p>
		<div class="table-responsive">
			  <table style="font-size: 14px;" class="table table-bordered table-striped text-center">
                             <tr class="text-center">
                                 <th>ردیف</th>
                                 <th>شماره سفارش</th>
                                 <th>نام کاربری</th>
                                 <th>تاریخ خرید</th>
                                 <th>مبلغ سفارش</th>
                                 <th> وضعیت پرداخت</th>
                                 <th>عملیات</th>

                             </tr>
                             <?php
                               $jdf =  new \App\lib\JDF();
                             
                               ?>

                             @foreach($orders as $key=>$value)
                               <tr>
                                   <td>{{++$key}}</td>
                                   <td>{{$value->order_code}}</td>
                                   <td>{{$value->get_user->username}}</td>
                                   <td>{{$jdf->tr_num($jdf->jdate('Y-m-d',$value->time))}} - {{$jdf->tr_num($jdf->jdate('H:i:s',$value->time))}} </td>
                                    <td>{{number_format($value->price)}} تومان </td>
                                   <td>
                                       @if($value->pay_status)
                                         <span>پرداخت شده</span>
                                       @else
                                           <span class="red">در انتظار پرداخت </span>
                                       @endif
                                   </td>
                                   <td>
                                       <a class="eye" href="{{url('admin/order/'.$value->id)}}" title="مشاهده"></a>
                                       <span onclick="del_row('{{$value->id}}','{{url('admin/order')}}','{{Session::token()}}')" title="حذف" style="margin-right: 5px;"><i class="icon-trash"></i></span>
                                   </td>
                               </tr>
                             @endforeach
                         </table>
		</div>
	 
	</div>
</div>

@endsection