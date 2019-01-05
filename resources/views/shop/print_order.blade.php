<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	 <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
     <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-rtl.min.css')}}">
     <link rel="stylesheet/less" href="{{asset('css/print.less')}}">
</head>
<body>
<div style="width: 70%;margin: auto;">
  <div class="text-center" style="margin-top: 10px;margin-bottom: 10px;">
    	  	<button class="btn btn-default">پرینت برگه سفارش</button>
    	  	<a class="btn btn-default" href="{{url('create_pdf_file').'?id='.$order->id}}">فایل pdf سفارش</a>
    	  </div>
	<div class="header">
	   <div class="col-md-6">
	   	<p>
	   		<span>شماره سفارش : </span>
	   		<span>{{$order->order_code}}</span>
	   	</p>
	   	<p>
	   		<span>نام و نام خانوادگی خریدار : </span>
	   		<span>{{$order->get_user_address->full_name}}</span>
	   	</p>
	   	<span>تاریخ ثبت سفارش : </span>
	   	<?php use App\lib\JDF;
        $jdf = new JDF();
	   	 ?>
	   	<span style="direction: rtl;">{{$jdf->tr_num($jdf->jdate('Y/m/d - H:i:s',$order->time))}}</span>
	   </div>
	   <div class="col-md-6 text-left">
	   	<img src="{{url('create_barcode?order_code=').$order->order_code}}">
	   </div>
	   <div class="clearfix"></div>
	   
    </div>
 <?php $total_price = 0; ?>
    <div class="content">
    	   @foreach($order->get_order_row as $key=>$value)
    	    <?php
	          $product = $value->get_product;
	          $color = $value->get_color;
	          $service = $value->get_service;
	       ?>
             <div class="product_item">
             	<div class="col-md-3">
             	<img src="{{url('upload/product_image').'/'.$product->get_image->url }}">
             </div>
             <div class="col-md-9">
             	<p class="title">
             
                  {{ $product->title }}
              
               </p>
          <p class="code">
             
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
			   <div class="clearfix"></div>
             </div>

    	   @endforeach
    	 
    	
    </div>
    <table class="table table-bordered" style="margin-top: 15px;">
    	  <tr>
                  <td><span>شیوه ارسال محصول</span></td>
                  <td>
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
                  <td><span> استان - شهر</span></td>
                  <td><span>{{$order->get_user_address->get_ostan->ostan_name}}</span> - 
                  <span>{{$order->get_user_address->get_shar->shar_name}}</span>
                  </td>
              </tr>

              <tr>
                  <td><span> شماره تماس</span></td>
                  <td><span>
                  	{{$order->get_user_address->mobile}}- {{ $order->get_user_address->phone .' - ' .$order->get_user_address->city_code}}
                  </span></td>
              </tr>
              <tr>
              	<td><span>هزینه پرداخت شده</span></td>
              	<td><span>{{number_format($order->price)}}</span>  	<span>تومان</span></td>
              </tr>
             
    </table>

</div>
</body>
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/less.min.js')}}"></script>
</html>