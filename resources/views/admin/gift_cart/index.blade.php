
@extends('layouts.admin')
@section('title','مدریت کارت هدیه')
@section('content')


@if(session()->has('success'))
<div class="alert alert-success alert-dismissable">
    <button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
           {{session('success')}}
</div>
@endif
 <div class="panel panel-primary">

  <div class="panel-heading"> مدیریت کارت هدیه
     <a title="اضافه نمودن " href="{{url('admin/gift_cart/order/create')}}"
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
            <th>کد کارت</th>
            <th>
            <span>مقدار تخفیف</span>
            <span style="display: block;font-size: 11px;">بر حسب تومان</span>     
            </th>
            <th>وضعیت کارت</th>
            <th>متعلق به کاربر</th>
            <th>دستورات</th>
            </tr>
      </thead>
           
              <tbody>
              @php $i=1; @endphp
              @foreach($gift_carts as $gift_cart)
              <tr>

              <td>{{ $i }}</td>
              <td>{{ $gift_cart->code }}</td>
              <td>{{ $gift_cart->value }}</td>
              <td>
              <?php $time = time(); ?>
              @if($gift_cart->time > $time)
              <span style="color: green">فعال</span>
              @else
              <span style="color:red"> غیر فعال</span>
              @endif
              </td>

              <td>{{$gift_cart->get_user->username}}</td>


              <td >
              <a href="{{url('admin/gift_cart/order').'/'.$gift_cart->id.'/edit'}}" 
              style="color:#368bff;"  data-toggle="tooltip" data-placement="top"
              title="ویرایش "   >
              <i class="icon-edit"></i>
              </a>

              <a title="حذف " style="color: red;cursor: pointer;padding-right: 5px;"
              data-toggle="tooltip" data-placement="top"
              onclick="del_row('{{$gift_cart->id }}','{{ url('admin/gift_cart/order')}}','{{ Session::token() }}')" 
              >
              <i class="icon-trash"></i>
              </a>
              </td>
              </tr>
              @php $i++  @endphp
              @endforeach
              @if($gift_carts->count()==0)
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
          {{$gift_carts->links()}}
 
@endsection
