@extends('layouts.site')

@section('header')
  <link rel="stylesheet" type="text/css" href="{{asset('slick/slick/slick.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('slick/slick/slick-theme.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('flipclock/flipclock.css')}}">


@endsection

@section('content')

<section class="index">
 <?php
 


 ?>
<div class="row">

   
   <div class="   col-lg-3 col-md-3 col-sm-12 col-xs-12 pr0" >
      <div class="image_box" style="margin-top: 15px;">
         <img class="img-responsive" src="{{url('upload/category_image/category48.jpg')}}">
      </div>
      <div class="image_box " style="margin-top: 15px;">
         <img class="img-responsive" src="{{url('upload/category_image/category48.jpg')}}">
      </div>
      <div class="image_box" style="margin-top: 15px;">
         <img class="img-responsive" src="{{url('upload/category_image/category48.jpg')}}">
      </div>
      <div class="image_box" style="margin-top: 15px;">
         <img class="img-responsive" src="{{url('upload/category_image/category48.jpg')}}">
      </div>
   </div>

      {{-- code mthl left slidebar====================== --}}
   <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 pr0 pl0">

      {{-- html slide=================================== --}}
      @if(sizeof($sliders) > 0)
         <div class="slider_box "  >
            <div class="slider">
            <div class="img_slider">
            @foreach($sliders as $key=>$value)
            <div id="slide_img_{{$key}}"
            class="slider_div animation"  @if($key==0) style="display:block" @endif>
                      <a href="">
                        <img  src="{{url('upload/slider_image/'.$value->image)}}">
                      </a>
                  </div>
               @endforeach
            </div>
            <div class="footer_slider">
               <ul class="list-inline slider_li">
                  @foreach($sliders as $key=>$value)
                      <li id="slider_li_{{$key}}" class=" @if($key==0) slider_li_active @else slide_li
                       @endif ">
                        <div><span id="slider_span_{{$key}}" class="@if ($key==0) ab  @endif"> </span></div>
                       {{$value->title}}
                      </li>
                     @endforeach

               </ul>
            </div>

            {{-- icon next privous slide --}}
            <div id="next_slide" onclick="next()"></div>
            <div id="previous_slide" onclick="previous()"></div>
            </div>
         </div>
      @endif

      <!--  -->
      @if(sizeof($amazings)>0)
        <?php

        $array = [5=>'هزار تومان' , 6 =>'هزار تومان',7=>'میلیون تومان'];

         ?>
       <section id="amazing_product_box">

         @foreach($amazings as $key=>$value)

            <?php   if($value->get_product)  ?>
       <a href="#">
        <div class="amazing_product" id="amazing_product_{{$key}}"

          @if($key == 0) style="display: block;" @endif >

         <div class="col-md-6 col-sm-6 col-xs-12 right">

           <p class="title">

           پیشنهاد شگفت انگیز

           </p>

           <span class="price1">

               {{str_replace('000','',$value->price1 )}}

           </span>

           <span class="price2">

                {{ str_replace('000','',$value->price2) }}

                @if(array_key_exists( strlen($value->price2),$array))

                   {{$array[strlen($value->price2)]}}

                @endif

           </span>

           <p class="tozihat">

             {!! nl2br($value->tozihat) !!}

           </p>

          <p  class="title text-left">

          فرصت باقی مانده تا این پیشنهاد

          </p>

           <br>

           {{--  <p id="amazing_finish_{{ $key }}" style="display: none;"  >

            <img  src="{{ url('images/Finished_Badge.png') }}">

            </p> --}}

           <p id="amazing_clock_{{$key}}">    </p>

         </div>



         <div class="col-md-6 col-sm-6 col-xs-12 left">

           <p class="product_title">

              {{$value->title}}

           </p>

           <div class="img_box text-center">

             @if($value->get_img)

               <img src="{{asset('upload/product_image'.'/'.$value->get_img->url)}}">

             @endif

           </div>

         </div>

      </div>
  </a>
      @endforeach

    </section>

    
       <div class="amazing_box" style="direction:ltr;">

         <section id="amazing">

           @foreach($amazings as $key=>$value)

           <div id="amazing_footer_{{$key}}" class="amazing_footer @if($key==0) active_amazing  @endif "   onclick="show_amazing({{$key}},{{sizeof($amazings)}})">
          <span id="amazing_span_{{$key}}"  class="amazing_span @if($key==0) tick @endif" >

          </span>

          {{$value->m_title}}

           </div>

           @endforeach

         </section>

       </div>

      @endif



      {{-- html code new product --}}
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
          <img   src="{{asset('upload/product_image'.'/'.$value->get_image->url)}}">
          </div>
          @endif

          <p class="product_title">

             @if(strlen($value->title)>50)
                {{ mb_substr($value->title,0,33). '  ...  ' }}
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

             @if(strlen($value->title)>50)
                {{ mb_substr($value->title,0,33). '  ...  ' }}
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

             @if(strlen($value->title)>50)
                {{ mb_substr($value->title,0,33). '  ...  ' }}
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
</div>
</div>

</section>

@endsection

@section('footer')

<script type="text/javascript" src="{{ asset('js/slider_index.js')}}">
</script>

<script type="text/javascript">
     load_slider({{sizeof($sliders)}});
</script>
<script type="text/javascript" src="{{asset('slick/slick/slick.js')}}"></script>
<script type="text/javascript" src="{{asset('flipclock/flipclock.min.js')}}"></script>
<script type="text/javascript">

  $('.regular').slick({
  dots: false,
  infinite: false,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

  //==================================
  // script time amazing part

</script>





<script type="text/javascript">

    var amazing_time = new Array;

    var i=0;

    <?php

      foreach($amazings as $key=>$value)

      {

       $time = ($value->timeStamp - time() > 0) ? $value->timeStamp - time() : 0;

       ?>

       amazing_time[<?= $key; ?>] = <?= $time; ?>;

       i++;

       <?php

      }
  ?>

     for( var j = 0 ; j < amazing_time.length ; j++ ){

       var clock;

      clock = $('#amazing_clock_' + j).FlipClock({

            clockFace: 'HourlyCounter',

            autoStart: false,

            id:j,

            callbacks: {

              stop: function() {

                var img =  '<img  src="{{ url('images/Finished_Badge.png') }}">'

                $('#amazing_clock_'+this.id).html(img);

              }

            }

        });

          clock.setTime(amazing_time[j]);

          clock.setCountdown(true);

          clock.start();

     }

  $('#amazing').slick({
  dots: false,
  loop:true,
  infinite: false,
  speed: 700,
  slidesToShow: 3,
  slidesToScroll: 1,

});



</script>
<script type="text/javascript">
  $(document).ready(function(){

  load_slider_amazing({{sizeof($amazings)}});
});

</script>

@endsection
