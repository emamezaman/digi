@extends('mobile.layout')

@section('header')
<link rel="stylesheet" type="text/css" href="{{ url('css/swiper.min.css') }}">
 
  <link rel="stylesheet" type="text/css" href="{{asset('slick/slick/slick.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('slick/slick/slick-theme.css')}}">  
@stop
@section('content')
<div  id="show_cat">

	 <!-- Swiper -->
  <div class="swiper-container">
    <div class="swiper-wrapper">

	    	@foreach($sliders as $key=>$value)
			      <div class="swiper-slide">
			      	
			        <img  src="{{ asset('upload/slider_image').'/'.$value->image }}">
			      
			      </div>

	        @endforeach

      </div>

    
  </div>

  <div style="width: 100%;background-color: white; padding-top: 20px;">

  	<ul class="cat_ul">

  		@foreach ($cat_list as $key=>$value)
  	         <li>
  	         	<a href="{{ asset('category').'/'.$category1->title_en 
                 .'/'.$category2->title_en .'/'.$key  }}">

                 <span> {{ $value['title_fa'] }}</span>

                 @if($value['cat_child'] == 'ok')
                   <span class="fa fa-angle-left pull-left" style="padding-left: 10px;font-size: 17px;">
                   	
                   </span>
                 @endif
  	         		
  	         	</a>
  	         </li>
  		@endforeach

      
  		
  	</ul>
  	
  </div>


   
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
                 @if((!empty($value->discounts)) && (!empty($value->price)))
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

<script type="text/javascript" src="{{ url('js/swiper.min.js') }}">

</script>
<script type="text/javascript" src="{{asset('slick/slick/slick.js')}}"></script>

 <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false
      }
    });
  </script>

@stop