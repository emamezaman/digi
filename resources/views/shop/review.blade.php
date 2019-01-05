@extends('layouts.site')

@section('title','سبد خرید شما')

@section('content')




<div class="review box row">


    {{-- header --}}

      <div class="header_review">

        <ul>
            <li class=" line small_line bgc_green "></li>
            <li class=" line small_line bgc_green "></li>
            <li class=" line small_line bgc_green "></li>
            <li class=" line small_line bgc_green "></li>

            <li class="bullet bgc_green tick  ">
                <a href="">
            <span>ورود به دیجی آن لاین</span>
          </a>
            </li>
            <li class=" line tall_line bgc_green "></li>
            <li class="bullet  bgc_green tick ">
                <a href="">
            <span>اطلاعات ارسال سفارش  </span>
          </a>

            </li>

            <li class=" line tall_line bgc_green "></li>
            <li class="bullet border_green ">
                <a href="">
            <span>بازبینی سفارش  </span>
          </a>
            </li>
            <li class=" line tall_line bgc_lightgray "></li>
            <li class="bullet border_lightgray">
                <a href="">
            <span>اطلاعات پرداخت</span>
          </a>
            </li>
            <li class=" line small_line bgc_green "></li>
            <li class=" line small_line bgc_green "></li>
            <li class=" line small_line bgc_green "></li>
            <li class=" line small_line bgc_green "></li>
        </ul>
    </div>

    {{-- end header --}}
<div class="cart">



        <div id="box_cart">
    {{-- با این متد تمام موجودی سبد خرید را میخوانیم --}}
    <?php $cart_data = App\Cart::get(); ?>

        @if(sizeof($cart_data)==0)

    <div class="alert alert-danger">سبد خرید شما خالی است</div>
        @else
         <div class="top_title">
             <p><i class="fa fa-caret-left"></i>سبد خرید شما در دیجی آن لاین</p>
             <p>افزودن کالاها به معنی  رزرو کالا برای شما نیست  برای ثبت سفارش باید مراحل بعی سفارش را تکمیل نمائید.</p>
           </span></a>
         </div>

       	 <div class="table-responsive">
       	 	<table id="cart_table" class="table table-bordered table-hover">
        	<thead>
        		<tr>
        			<th>شرح محصول</th>
        			<th>تعداد</th>
        			<th>قیمت واحد</th>
        			<th colspan="2">قیمت کل</th>

        		</tr>
        	</thead>
        	<tbody>

               <?php
              $total_price = 0;
              $discounts_price = 0;
                ?>

        		 @foreach ($cart_data as $key=>$value)

        		  @foreach ($value as $key2=> $value2)
        		  <?php
                          $s_c = explode('_', $key2);
                          $service_id = $s_c[0];
                          $color_id = $s_c[1];
                        // با این متد مشخصات محصول و گارانتی و رنگ را میخوانیم
                          $data = App\Cart::getData($key,$service_id,$color_id);
        		  ?>
        				@if($data)
        		  	<tr>
        			<td class="cart-product-info  ">


        				<div class="box-product-info">
        					<div class="col-md-3 col-sm-3 ">
        						@if($data['img'])

                                 <img src="{{  url('upload/product_image').'/'.$data['img'] }}" >
        						@endif
        					</div>
        					<div class="col-md-9 col-sm-9 ">
        						<p class="title_product">
        							<a href="{{ url('product').'/'.$data['code_url'].'/'.$data['title_url'] }}">
        								{{ $data['title'] }}
        							</a>
        						</p>
        						<p class="code_product">
        							<a href="{{ url('product').'/'.$data['title_url'].'/'.$data['code_url'] }}">
        							{{ $data['code'] }}</a>
        						</p>
        						@if($data['color_code'])
        						<p class="box_color">
                                   <span class="title_color">رنگ :</span>
        							<label style="background-color:#{{ $data['color_code'] }}"></label>
                                     <span class="name">{{ $data['color_name'] }}</span>
        						</p>
        						@endif

        						@if($data['service_name'])
                                 <p><span>گارانتی : </span>{{ $data['service_name'] }}</p>
        						@endif

        					</div>
        				</div>
        			</td>
        			<td class="cart-number">
        				<span >{{ $value2 }}</span>
        			</td>
        			<td class="cart-price1">
        				 <div class="box-price">
        				 	<span class="number">{{ number_format($data['price']) }}</span>
        				 	<span class="title">تومان</span>
        				 </div>
        			</td>
        			<td class="cart-price2">
        				<div class="box-price">
        					<span class="number">{{ number_format($data['price'] * $value2) }}</span>
        					<span class="title">تومان</span>
        				</div>
        			</td>
        			<td class="last">
                        <a href="{{ url('cart') }}" class="blue-sky"> <span class="fa fa-refresh" ></span></a>

                            </td>
        		</tr>
                <?php
                 $total_price += $data['price'] * $value2;
                 $discounts_price += $data['discounts_price'] * $value2;
                 ?>
        		@endif
        		  @endforeach
        		@endforeach

        	</tbody>
        </table>
          </div>
  <div class="pay_title">
      <p> <span class="fa fa-caret-left"></span> خلاصه صورت حساب  </p>
  </div>

  <?php
  $order_info = Session::get('order_info');
  $order_type = array_key_exists('order_type',$order_info) ? $order_info['order_type'] : 0;
      $price = $order_type == 1 ? 10000 : 0;//اگر شیوه ارسال پستی انتخاب شده بود 10000 تومن به هزینه سفارش اضافه کن

    ?>


  <div class="order_item_price">
      <div>
          <span>جمع کل خرید : </span>
          <span class="pull-left">{{ number_format($total_price)  }} تومان</span>
      </div>
      <div class="price_send">
          <span>هزینه ارسال  ، بیمه و بسته بندی سفارش  : </span>
          @if( $order_type==1)
          <span class="pull-left">{{ number_format(10000)  }} تومان</span>

          @else
          <span class="pull-left"> پس کرایه </span>
          @endif
      </div>
      <div>
          <span>تخفیف  : </span>
          <span class="pull-left">{{ number_format($total_price - ($discounts_price+$price))  }} تومان</span>
      </div>
      <div class="price">
          <span>مبلغ قابل پرداخت : </span>
          <span class="pull-left">{{ number_format($discounts_price + $price)  }} تومان</span>
          <?php
               Session::put('price',$discounts_price + $price);
          ?>
      </div>
  </div>

   <div class="pay_title">
      <p> <span class="fa fa-caret-left"></span>اطلاعات ارسال سفارش  </p>
  </div>
  <div class="order_address_location">
      <table>
          <tr>
            <td>
              <div class="icon_review_location"></div>
            </td>
            <td>
                <span>این سفارش به </span>
                <span> {{ $address->full_name }}</span>
                <span>به آدرس </span>
                <span>{{ $address->address }}</span>
                <span>به شماره تماس </span>
                <span>{{ $address->mobile }}</span>
                <span>ارسال می گردد.</span>
            </td>
        </tr>

          <tr>
            <td>
              <div class="icon_review_car"></div>
            </td>
            <td>
               @if($order_type==1)
                <span> سفارش از طریق تحویل اکسپرس دیجی کالا با هزینه 10،000 تومان به شما تحویل داده خواهد شد </span>
                @else
                <span>سفارش شما به صورت پس کرایه ارائه میشود.</span>
                @endif
            </td>
        </tr>




      </table>
  </div>
  <br><br>
  <div class="form-group">
      <a href="{{ url('payment') }}" class="btn btn-success">تائید و ادامه خرید</a>
  </div>

        @endif
    </div>

</div>
</div>



@endsection
