<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>فاکتور فروش</title>
<link rel="stylesheet" type="text/css" href="{{public_path().'/css/pdf.css'}}">
 
</head>



<body>


		
		 
	 
	

	<div style="width: 85%;margin: auto;">
   <div class="header">
	   <div class="col-md-6">
          	<p>
	   		<span>شماره سفارش : </span>
	   		<span> <?php echo $order->order_code; ?></span>
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
	   <div class="col-md-6">
	   		 
        <img style="margin:15px 2px;"  > 
	<!-- <img src="{{url('')}}/create_barcode?order_code={{$order->order_code}}">   -->
	   </div>
	 
	  
	   
	
	   <div class="clearfix"></div>
</div>

 <div class="content">
  @foreach($order->get_order_row as $key=>$value)
    	    <?php
	          $product = $value->get_product;
	          $color = $value->get_color;
	          $service = $value->get_service;
	       ?>
<div class="product_item">
	<div class="col-md-3">
    <?php 
        
        $path = public_path('/upload/product_image/'.$product->get_image->url);
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
  
        $data = file_get_contents($path);
        ?>
        <img style="margin:15px 2px;" src="{{ $base64 }}">

	</div>

	<div class="col-md-9">
             	<div class="title">
             
                  {{ $product->title }}
              
               </div>
          <div class="code">
             
                  {{ $product->code }}
          </div>

           @if($color)
          <div class="box_color">
              <span class="title_color">رنگ :</span>
              <label style="background-color:#{{ $color->code }}"></label>
              <span class="name">{{ $color->title }}</span>
          </div>
        @endif

      @if($service)
          <div><span>گارانتی : </span>{{ $service->service_name }}</div>
      @endif
      <div>
      	<span>تعداد : </span>
      	<span> {{$value->number}}</span>
      </div>

      <div class="box-price">
      	<span>قیمت واحد :</span>
      <span class="number">{{ number_format($product->price- $product->discounts) }}</span>
      <span class=" ">تومان</span>
      </div>

       <div class="box-price">
	      <?php
	      $price = $value->number * ($product->price -$product->discounts);
	      
	      ?>
	      <span>قیمت کل :</span>
	      <span class="number">{{ number_format($price) }}</span>
	      <span class=" ">تومان</span>
	  </div>

             </div>
			   <div class="clearfix"></div>

</div>
@endforeach 
	
</div>
 <table >
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
</html>