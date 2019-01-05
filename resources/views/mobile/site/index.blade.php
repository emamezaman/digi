@extends('mobile.layout')
@section('header')
 <link rel="stylesheet" type="text/css" href="{{asset('slick/slick/slick.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('slick/slick/slick-theme.css')}}">
  <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="{{ url('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/owl.theme.default.min.css') }}">
      {{--  --}}
     <link rel="stylesheet" type="text/css" href="{{asset('flipclock/flipclock.css')}}">    
@stop

@section('content')
   <div id="index">
  {{-- slider top --}}
      @if(sizeof($sliders) > 0)
         <div class="slider_box " id="slider_box1" >
            <div class="slider">
                  <div class="img_slider">
                      @foreach($sliders as $key=>$value)
                          <div id="slide_img_{{$key}}" class="slider_div animation"  
                                  @if($key==0) style="display:block" @endif>
                                      <a href="#">
                                           <img  src="{{url('upload/slider_image/'.$value->image)}}">
                                      </a>
                          </div>
                        @endforeach
                  </div>
            </div>
         </div>
      @endif
 
 
       
      @if(sizeof($amazings)>0)

           <?php 
              $array = [4=>'هزار تومان' ,5=>'هزار تومان' , 6 =>'هزار تومان',7=>'میلیون تومان'];
            ?>

        <div id="amazing_product">

        <div class="amazing_header">


          <?php $array = get_amazing_time($old_amazing) ?>

            @if(sizeof($array)==2)

            <ul style="font-size: 13px;">

              <li class="pull-right" >

                <span > فرصت باقیمانده تا این پیشنهاد</span>

              </li>

              



              <li class="pull-left" ">
                 <span  class="m" >
                      {{ $array['m'] }}
                </span>
                <span  >دقیقه  </span>
              </li>

              <li class="pull-left">
                :
              </li>
              
              <li class="pull-left" >
         
                 <span  class="h" >
                      {{ $array['h'] }}
                 </span>
                <span >ساعت</span>

              </li>

            </ul>
             
             <div class="clearfix">
               
             </div>
 
            

            @endif

           </div>

          <div class="amazing_product owl-carousel">
             
             @foreach($amazings as $key=>$value)
                 <?php 
               
                  $img = $value->get_img; 
                  $product = $value->get_product;
                  $time = $value->timeStamp;
                  $t = $time - time() ; 
                   
                 ?>
                  
                  

                 <div class="item" >
                   <div class="Finished_Badge" @if($t < 0 )style="opacity:1!important"@endif>
                         <img  src="{{ url('images/Finished_Badge.png') }}">
                   </div>
                  
                  
                 <a href="{{ url('product').'/'.$product->code_url.'/'.$product->title_url }}">

                   <p class="product_title">

                   {{ $value->m_title }}

                   </p>

                 </a>


                 <div @if($t < 0)style="opacity: 0.3"@endif>
  
 
                 
                 <p class="amazing_img">
                   @if($img)
                    <img class="img-responsive" src="{{ url('upload/product_image').'/'.$img->url }}">
                   @endif
                 </p>
                 <p class="title_img">
                  <img src="{{ url('images/spicial.JPG') }}">
                 </p>
                 <p class="amazing_price">
                  <?php 
                  $price1 = str_replace('000','',$value->price1) ;
                  $price2 = str_replace('00','',$value->price2); 
                  ?>

                   <span class="price1">
                     {{ number_format($price1) }}
                     <label class="line"></label>
                   </span>
                   <?php $l=strlen($price2); ?>
                   <span class="price2">
                     {{ number_format($price2) }} 
                   </span>
                 </p>
               
                 
                 

                </div>
            
         </div>
            @endforeach
          </div>
        
        </div>

        @endif     
  

     
      <div class="new_product"  style="direction: ltr;"   >
        <div class="product_title">
             <span class="title">جدید ترین محصولات فروشگاه</span>
        </div>
      <div class="regular" >
          
      @foreach($new_product as $key=>$value)
            
       <a  href="{{url('product'.'/'.$value->code_url.'/'.$value->title_url)}}">
          <div class="product_box">
              @if($value->get_image)
                 <div class="product_image_box">
                       <img src="{{asset('upload/product_image'.'/'.$value->get_image->url)}}">
                 </div>
              @endif

          <p class="product_title">
      
             @if(strlen($value->title)>20)
                {{ mb_substr($value->title,0,20). '  ...  ' }} 
             @else
              {{$value->title}}
             @endif
           
          </p>

            <p class="@if(!empty($value->discounts) && !empty($value->price)) product_discounts @else product_discounts2 @endif">
                 @if(!empty($value->discounts) && !empty($value->price))
                    {{number_format($value->price)}} <span>تومن</span>
                 @endif
            </p>
          <p class="product_price">
          @if(!empty($value->discounts) && !empty($value->price))
            {{number_format($value->price - $value->discounts)}} <span>تومن</span>
          @elseif(!empty($value->price))
          {{number_format($value->price)}} <span>تومن</span>
          @endif
                          
          </p>
          </div>
          </a>
          @endforeach
        
      </div>  
      </div>

        {{-- html code order product --}}
      <div class="order_product"  style="direction: ltr;"   >
        <div class="product_title">
          <span class="title">پرفورش ترین محصولات فروشگاه</span>
        </div>
      <div class="regular" >
          @foreach($order_product as $key=>$value)
           <a  href="{{url('product'.'/'.$value->code_url.'/'.$value->title_url)}}">
          <div class="product_box">
          @if($value->get_image)
          <div class="product_image_box">
          <img   src="{{asset('upload/product_image'.'/'.$value->get_image->url)}}">
          </div>
          @endif

          <p class="product_title">
           
             @if(strlen($value->title)>20)
                {{ mb_substr($value->title,0,20). '  ...  ' }} 
             @else
              {{$value->title}}
             @endif
            
          </p>

            <p class="@if(!empty($value->discounts) && !empty($value->price)) product_discounts @else product_discounts2 @endif">
                 @if(!empty($value->discounts) && !empty($value->price))
                    {{number_format($value->price)}} <span>تومن</span>
                 @endif
            </p>
          <p class="product_price">
          @if(!empty($value->discounts) && !empty($value->price))
            {{number_format($value->price - $value->discounts)}} <span>تومن</span>
          @elseif(!empty($value->price))
          {{number_format($value->price)}} <span>تومن</span>
          @endif
                          
          </p>
          </div>
        </a>
          @endforeach
        
      </div>  
      </div>


       {{-- html code new product --}}
      <div class="view_product"  style="direction: ltr;"   >
        <div class="product_title">
          <span class="title">پربازدید ترین محصولات فروشگاه</span>
        </div>
      <div class="regular" >
          @foreach($view_product as $key=>$value)
           <a  href="{{url('product'.'/'.$value->code_url.'/'.$value->title_url)}}">
          <div class="product_box">
          @if($value->get_image)
          <div class="product_image_box">
          <img   src="{{asset('upload/product_image'.'/'.$value->get_image->url)}}">
          </div>
          @endif

          <p class="product_title">
            
             @if(strlen($value->title)>20)
                {{ mb_substr($value->title,0,20). '  ...  ' }} 
             @else
              {{$value->title}}
             @endif
            
          </p>

            <p class="@if(!empty($value->discounts) && !empty($value->price)) product_discounts @else product_discounts2 @endif">
                 @if(!empty($value->discounts) && !empty($value->price))
                    {{number_format($value->price)}} <span>تومن</span>
                 @endif
            </p>
          <p class="product_price">
          @if(!empty($value->discounts) && !empty($value->price))
            {{number_format($value->price - $value->discounts)}} <span>تومن</span>
          @elseif(!empty($value->price))
          {{number_format($value->price)}} <span>تومن</span>
          @endif
                          
          </p>
          </div>
        </a>
          @endforeach
        
      </div>  
      </div>
     
    
   </div>

@stop

@section('footer')
<script type="text/javascript" src="{{ url('js/jquery.touchSwipe.min.js') }}"></script>
<script type="text/javascript" src="{{asset('slick/slick/slick.js')}}"></script>
<script type="text/javascript" src="{{asset('js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('flipclock/flipclock.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/slider_index_mobile.js')}}"></script>
 
<script type="text/javascript">
     load_slider({{sizeof($sliders)}}); 
</script>

@stop


<?php 
function get_amazing_time($old_amazing){
  
  $array = array();
  $time_stamp = 0;
  $time=0;
  if($old_amazing){
    $time_stamp = $old_amazing->timeStamp;
  }
  if($time_stamp > time()){
    $time = $time_stamp-time();
    $h_t = $time/3600;
    $h = intval($h_t);
    $array['h'] = $h;
    $m_t = $time - $h * 3600;
    $m_t = $m_t / 60;
    $m = intval($m_t);
    $array['m'] = $m;
  }
  
    return $array;
}
?>

        
   
 
