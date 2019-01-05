<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
   <style type="text/css">
   body{
    text-align: right;
    direction: rtl;
    font-size: 13px;
    font-family:tahoma;
   }
     .header{
     font-family:tahoma; 
     background:#f7f9fa;
     padding: 20px;
     width: 100%;
     font-size: 12px;
     }
.col-md-6{
  float:right;
  width:45%;
  padding: 1px 10px; 
  font-family: "tahoma";
}
.content{
  margin-top: 20px;
}
.col-md-3{
  padding: 1px 10px;
  float:right;width: 20%;
}
.product_item{
   margin-top: 10px;
   border:1px solid #eee;
   direction: rtl;
   font-family:tahoma;
}
.col-md-9{
  width: 70%;
  float: right;
  padding: 1px 10px;
}
table{
    margin-top: 15px;
    margin-top: 15px;
    width: 100%;
 
    font-family:tahoma;
    direction: rtl;
}
table td{
    border: 1px solid #eee;
    padding: 10px;
    font-family:tahoma;
    direction: rtl;
}
   </style>
  </head>

  <body >
    <div style="width: 70%;margin: auto;">

      <div class="header">
         <div class="col-md-6">
            
          <p>
            <span>شماره سفارش : </span>
            <span><?php echo $order->order_code ?></span>
          </p>

          <p>
            <span>نام و نام خانوادگی خریدار : </span>
            <span>{{$order->get_user_address->full_name}}</span>
          </p>

          <span>تاریخ ثبت سفارش : </span>
          <?php use App\lib\JDF;
            $jdf = new JDF();
           ?>
          <span style="direction: rtl;">
            {{$jdf->tr_num($jdf->jdate('Y/m/d - H:i:s',$order->time))}}
          </span>
         </div>

         <div class="col-md-6">
             <img src="{{url('create_barcode?order_code=').$order->orde_code}}">
         </div>
         <div style="clear: both;"></div>

        </div>

        <?php $total_price = 0; ?>
           <div class="content"  >
           	   @foreach($order->get_order_row as $key=>$value)
           	    <?php
       	          $product = $value->get_product;
       	          $color = $value->get_color;
       	          $service = $value->get_service;
       	       ?>
                    <div class="product_item">
                    	<div class="col-md-3">
                    	<img style=" width: 100%;" src="{{url('upload/product_image').'/'.$product->get_image->url }}">
                    </div>
                    <div class="col-md-9">
                    	<p style="padding-top: 10px;color: black;">

                         {{ $product->title }}

                      </p>
                 <p style="color: black;">

                         {{ $product->code }}
                 </p>

                  @if($color)
                 <p class="box_color">
                     <span class="title_color">رنگ :</span>
                     <label style="background-color:#{{ $color->code }}"></label>
                     <span class="name">{{ $color->title }}</span>
                 </p>
               @endif

             @if($service)
                 <p><span>گارانتی : </span>{{ $service->service_name }}</p>
             @endif
             <p>
             	<span>تعداد : </span>
             	<span> {{$value->number}}</span>
             </p>

             <p class="box-price">
             	<span>قیمت واحد :</span>
             <span class="number">{{ number_format($product->price- $product->discounts) }}</span>
             <span class=" ">تومان</span>
             </p>

              <p class="box-price">
       	      <?php
       	      $price = $value->number * ($product->price -$product->discounts);

       	      ?>
       	      <span>قیمت کل :</span>
       	      <span class="number">{{ number_format($price) }}</span>
       	      <span class=" ">تومان</span>
       	  </p>

                    </div>
       			    <div style="clear: both;"></div>
                    </div>

           	   @endforeach


           </div>
           <table >
              <tr>
                         <td ><span>شیوه ارسال محصول</span></td>
                         <td >
                             <span>
                                 @if($order->order_type==1)
                                     ارسال اکسپرس دیجی آن لاین
                                     @else
                                        باربری پس کرایه (ویژه لوازم خانگی سنگین)
                                 @endif
                             </span>
                         </td>
              </tr>
                      <tr>
                         <td ><span> استان - شهر</span></td>
                         <td > <span>{{$order->get_user_address->get_ostan->ostan_name}}</span> -
                           <span>{{$order->get_user_address->get_shar->shar_name}}</span>
                         </td>
                     </tr>

                     <tr>
                         <td ><span> شماره تماس</span></td>
                         <td ><span>
                          {{$order->get_user_address->mobile}}- {{ $order->get_user_address->phone .' - ' .$order->get_user_address->city_code}}
                         </span></td>
                     </tr>
                     <tr>
                      <td><span>هزینه پرداخت شده</span></td>
                      <td ><span>{{number_format($order->price)}}</span>  	<span>تومان</span></td>
                     </tr>

           </table>
    </div>
  </body>
</html>
