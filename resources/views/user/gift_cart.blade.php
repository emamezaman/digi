@extends('layouts.user')

@section('user') 
 
  
    
      <table style="font-size: 14px;margin-top: 20px;" class="table table-bordered table-striped table-hover">
  
            <tr>
            <th>ردیف</th>
            <th>کد کارت</th>
            <th>
            <span>مقدار تخفیف</span>
            </th>
          
            <th>وضعیت کارت</th>
 
    
            </tr>
 
           
               
              @php $i=1; @endphp
              @foreach($gift_carts as $gift_cart)
              <tr>

              <td>{{ $i }}</td>
              <td>{{ $gift_cart->code }}</td>
              <td>{{ number_format($gift_cart->value) }} تومان</td>
              <td>
               
              @if($gift_cart->status==0)
              <span style="color: green">استفاده نشده</span>
              @else
              <span style="color:red">استفاده شده</span>
              @endif
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

           
      </table>
 
      
   
  

          {{$gift_carts->links()}}
 
@endsection

 