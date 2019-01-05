
@extends('layouts.admin')
@section('title','مدریت کد تخفیف')
@section('content')


@if(session()->has('success'))
<div class="alert alert-success alert-dismissable">
    <button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
           {{session('success')}}
</div>
@endif
 
 <?php 
       $price_list[0]="برای تمام سفارشات";
       $price_list[500000]="برای سفارش های کمتر از پانصد هزار تومان";
       $price_list[1000000]="برای سفارش های کمتر از یک میلیون تومان";
       $price_list[2000000]="برای سفارش های کمتر از دو میلیون تومان";
       $price_list[3000000]="برای سفارش های کمتر از سه میلیون تومان";
       $price_list[4000000]="برای سفارش های کمتر از چهار میلیون تومان";
       $price_list[5000000]="برای سفارش های کمتر از پنج میلیون تومان";
       $price_list[5000000]="برای سفارش های بالای پنج میلیون تومان";
  ?>


 <div class="panel panel-primary">

 	<div class="panel-heading"> مدیریت کد تخفیف
     <a title="اضافه نمودن " href="{{url('admin/discount/order/create')}}"
             class="pull-left btn btn-info"  data-toggle="tooltip" data-placement="top"
            ><i class="icon-plus"> </i>  
    </a>
      <i class="clearfix"></i>
 	</div>
 
 	<div class="panel-body">
 	
 		<div class="table-responsive">
 			<table style="font-size: 14px;" class=" table-condensed table table-striped table-advance table-hover" style="width: 100%">
 			<thead>
 					<tr>
 						<th>ردیف</th>
 						<th>کد تخفیف</th>
 						<th>
               <span>مقدار تخفیف</span>
               <span style="display: block;font-size: 11px;">بر حسب درصد</span>     
            </th>
 						<th>وضعیت کد </th>
            <th>تخفیف برای</th>
            <th>دستورات</th>
 					</tr>
 			</thead>
           
 				<tbody>
 					@php $i=1; @endphp
 					@foreach($discounts as $discount)
 					<tr>
 					
 						<td>{{ $i }}</td>
 						<td>{{ $discount->code }}</td>
 						<td>{{ $discount->value }}</td>
 					 	<td>
               <?php $time = time(); ?>
               @if($discount->time >= $time)
               <span style="color: green">فعال</span>
               @else
               <span style="color:red"> غیر فعال</span>
               @endif
            </td>
            
            <td>
              {{$price_list[$discount->price]}}
            </td>
 		
 				

 						<td >
 							<a href="{{url('admin/discount/order').'/'.$discount->id.'/edit'}}" 
              style="color:#368bff;"  data-toggle="tooltip" data-placement="top"
                title="ویرایش "   >
                <i class="icon-edit"></i>
 							</a>

              <a title="حذف " style="color: red;cursor: pointer;padding-right: 5px;"
              data-toggle="tooltip" data-placement="top"
          onclick="del_row('{{$discount->id }}','{{ url('admin/discount/order')}}','{{ Session::token() }}')" 
              >
                  <i class="icon-trash"></i>
              </a>
 						</td>
 					</tr>
              @php $i++  @endphp
 					@endforeach
           @if($discounts->count()==0)
          <tr>
            <td colspan="5"><span style="display: block; text-align: center;font-size: 15px;">
              رکوردی یافت نشد
            </span></td>
          </tr>
          @endif
          
 				</tbody>
 			</table>
    </div>
      
  </div>
  
 </div>
		 			{{$discounts->links()}}
 
    
 
@endsection



        
        
           
             
           
            
  
              
      
 






 