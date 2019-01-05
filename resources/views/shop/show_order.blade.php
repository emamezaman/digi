@extends('layouts.site')

@section('title','نمایش اطلاعات سفارش')
@section('content')
    <?php
    $array = array();
    $array[0] = 'در انتظار پرداخت';
    $array[1] = 'در انتظار تائید مدریریت';
    $array[2] = 'پردازش انبار';
    $array[3] = 'ارسال شده';
    $array[4] = 'تحویل داده شده';
    $array[5] = 'عدم دریافت محصول';
    $array[6] = 'عدم پرداخت';
    ?>


   <div class="page_show_order box row">
      <div class="col-md-4">
         <p class="black"> از خرید شما سپاس گذاریم</p>
          @if($order->pay_status ==1)
            <div class="red pay_success" > <i class="fa fa-check"></i>خرید شما با موفقیت انجام شد و در حال آماده سازی برای ارسال می باشد</div>
            
            <p>
              <a href="{{url('user/order/print?id=').$order->id}}" class="btn btn-default">دریافت فاکتور سفارش</a>
            </p>
          
          @elseif($order->pay_type==6  || $order->pay_type==7)
            <div class="red pay_success" >
                 با توجه به روش انتخاب پرداخت برای این سفارش قبل از ارسال سفارش میتوانید پرداخت خود را تکمیل نمائید توجه کنید که سفارش شما تا 48 ساعت منتظر پرداخت خواهد بود بعد از آن سفارش شما به طور خودکار از فرایند خرید خارج خواهد شد
            </div>
          @elseif($order->pay_type==5)
            <div class="red pay_success" ><i class="fa fa-check"></i>خرید شما با موفقیت انجام شد و در حال آماده سازی برای ارسال می باشد</div>


          @else
          @endif
      </div>
      <div class="col-md-4">
         <table class="table table-bordered order_table">
             <tr>
                <td colspan="2">خلاصه وضعیت سفارش</td>

             </tr>
            <tr>
               <td>شماره سفارش </td>
               <?php
                 $code = $order->time ;

                 $user_id = \Auth::user()->id;
                 $order_code = substr($code,2,3).$user_id.substr($code,5,5);
                ?>
                <td>{{$order_code}}</td>
            </tr>
             <tr>
                 <td>قیمت کل </td>
                 <td>{{number_format($order->total_price)}} تومان</td>
             </tr>
             <tr>
                 <td> مبلغ قابل پرداخت </td>
                 <td>{{number_format($order->price)}} تومان</td>
             </tr>
             <tr>
                 <td>وضعیت پرداخت</td>
                 <td>
                     @if($order->pay_status==1)
                         <span>پرداخت شده</span>
                     @else
                         <span>در انتظار پرداخت</span>
                     @endif
                 </td>
             </tr>
             <tr>
                 <td>وضعیت سفارش</td>
                 <td class="red">
                     {{$array[$order->order_status]}}
                 </td>
             </tr>

         </table>
      </div>
      <div class="col-md-4">
          <table class="table table-bordered order_table">
               <tr>
                   <td colspan="2">
                       اطلاعات ارسال سفارش
                   </td>
               </tr>
              <tr>
                  <td>نام و نام خانوادگی</td>
                  <td>{{$order->get_user_address->full_name}}</td>
              </tr>
              <tr>
                  <td> استان - شهر</td>
                  <td>{{$order->get_user_address->get_ostan->ostan_name}} - {{$order->get_user_address->get_shar->shar_name}}</td>
              </tr>
              <tr>
                  <td> موبایل</td>
                  <td> {{$order->get_user_address->mobile}}</td>
              </tr>
              <tr>
                  <td> تلفن</td>
                  <td> {{ $order->get_user_address->phone .' - ' .$order->get_user_address->city_code}}</td>
              </tr>
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
          </table>
      </div>

       <div class=" show_order_cart table-responsive ">
         <div class="col-md-12 col-sm-12 ">
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
                    @foreach($order->get_order_row as $key=>$value)
                     
                      <tr>
                          <td class="cart-product-info  ">


                              <div class="box-product-info">
                                  <div class="col-md-3 col-sm-3 ">

                                              <?php
                                                  $product = $value->get_product;

                                                  $color = $value->get_color;
                                                  $service = $value->get_service;
                                               ?>
                                      @if($product->get_image->url)
                                          <img src="{{  url('upload/product_image').'/'.$product->get_image->url }}" class="img-responsive" >
                                       @endif
                                  </div>
                                  <div class="col-md-9 col-sm-9 ">
                                      <p class="title_product">
                                          <a href="{{ url('product').'/'.$product->code_url.'/'.$product->title_url }}">
                                              {{ $product->title }}
                                          </a>
                                      </p>
                                      <p class="code_product">
                                          <a href="{{ url('product').'/'.$product->code_url.'/'.$product->title_url }}">
                                              {{ $product->code }}</a>
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

                                  </div>
                              </div>
                          </td>
                          <td class="cart-number">
                             <span> {{$value->number}}</span>
                          </td>
                          <td class="cart-price1">
                              <div class="box-price">
                                  <span class="number">{{ number_format($product->price- $product->discounts) }}</span>
                                  <span class="title">تومان</span>
                              </div>
                          </td>
                          <td class="cart-price2">
                              <div class="box-price">
                                  <?php
                                  $price = $value->number * ($product->price -$product->discounts);
                                  ?>
                                  <span class="number">{{ number_format($price) }}</span>
                                  <span class="title">تومان</span>
                              </div>
                          </td>
                      </tr>
                    @endforeach
                 </tbody>
             </table>
         </div>
       </div>

         <?php 
         \Session::forget(['cart','order_info','price','total_price']);
         ?>

       <div class="show_order_level">

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

               <li class=" line tall_line bgc_green  "></li>
               <li class="bullet  bgc_green  tick">
                   <a href="">
                       <span>بازبینی سفارش  </span>
                   </a>
               </li>
               <li class=" line tall_line bgc_green "></li>
               <li class="bullet border_green">
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
       
   </div>





@endsection