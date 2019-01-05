@extends('layouts.admin')

@section('title','نمایش و مدریت سفارش ها')
@section('header')
    <link rel="stylesheet" href="{{url('css/jspc-gray.css')}}">
@endsection
@section('content')

   <div class="row">
      <div class="col-md-12 col-sm-12">
              @if(Session::has('message'))
              <div class="alert alert-info">
                   {{Session::get('message')}}
              </div>
              @endif
             <div class="panel panel-default">
                 <div class="panel-heading">
                     نمایش و مدریت سفارش ها
                 </div>
                    <p></p>
                 <div class="panel-body">
                     <div class="search_order">
                         <form action="{{url('admin/order')}}" method="get">
                          
                             <div class="form-group col-md-6 col-sm-6">
                                 <label for="">شماره سفارش</label>
                                 <input type="text" value="@if(array_key_exists('order_code', $data)){{$data['order_code']}}@endif" name="order_code" class="form-control">
                             </div>
                             <div class="form-group col-md-6  col-sm-6">
                                 <label for=""> از تاریخ </label>
                                 <input type="text" value="@if(array_key_exists('from_date', $data)){{ $data['from_date']}}@endif" id="start_date" name="from_date" class="form-control pdate ">
                             </div>
                             <div class="form-group col-md-6 col-sm-6">
                                 <label for="">   تا تاریخ</label>
                                 <input type="text" id="end_date"  value="@if(array_key_exists('to_date', $data)){{$data['to_date']}}@endif" name="to_date" class="form-control pdate">
                             </div>
                             <div class="form-group col-md-6 col-sm-6">
                                 <label for=""></label>
                                 <input type="submit" class="btn btn-primary" value="جستجو کن">
                             </div>
                         </form>
                     </div>
                    
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
                         {{ $orders->links() }}
                      </div>
                 </div>
             </div>

      </div>
   </div>

@endsection
@section('footer')
    <script type="text/javascript" src="{{url('js/js-persian-cal.min.js')}}"></script>
    <script type="text/javascript">
        var objCal4 = new AMIB.persianCalendar( 'start_date');
        var objCal5 = new AMIB.persianCalendar( 'end_date');
    </script>
@endsection