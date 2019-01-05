@extends('mobile.layout')

@section('header')
<link rel="stylesheet" type="text/css" href="{{ url('css/swiper.min.css') }}">
@stop

@section('content')
 

<div id="product" class="box">

  <?php $images = $product->get_images;  ?>

  @if(sizeof($images) > 0 )
  <!-- Swiper -->
 
 	
	  <div class="swiper-container" id="slider_box_1" dir="rtl" style="width: 100%;" >
    
    <div class="swiper-wrapper">
		
		@foreach($images as $key=>$value)
		 <div class="swiper-slide">
		 	
		     <img src="{{ asset('upload/product_image').'/'.$value->url }}">
		 	
		 </div>

		@endforeach
    
    </div>
  
     <div class="swiper-pagination"></div>
   
    
  </div>
 

 
	@endif
 

	 
 

	 <div class="show_product_details">
        
         <p class="f_title"> {{$product->title}} </p>
                    
          <p class="e_title"> {{$product->code}} </p>

	 @if($product->product_status == 1)
    <form action="{{ url('cart') }}" method="post" id="product_form">

                {{ csrf_field() }}

                <input type="hidden" name="product_id" value="{{ $product->id }}">

    <?php

                  $colors = $product->colors;

                  $color_id = 0;

                  $service_id =0;

                  $price = $product->price;

    ?>
              <div id="show-service">
		      
		      @if(sizeof($colors)>0)

                        <div class="show_product_color">

                            <p>انتخاب رنگ</p>

                            @foreach($colors as $key=>$value)

                            <?php if($key==0) $color_id = $value->id;

                            ?>
                                <div class="color_box" onclick="set_color({{$value->id}})" 

                                	@if($key==0) style="border-color:gray;" @endif>
                                    
                                    <label style="background:#{{$value->code}}"> </label> 

                                    <span>{{$value->title}}</span>
                               
                                </div>
                            
                            @endforeach 
                            
                            <div class="clearfix"> </div>

                          </div>
                          
				@endif

          <input type="hidden" name="color_id" value="{{ $color_id }}">

	 <!-- start section service -->

	 <?php $service = $product->get_service ?>

    @if(sizeof($service) > 0 )

        <div class="product_service_box">   

            <p class="title"> انتخاب گارانتی  </p>

          @foreach($service as $key=>$value)

         
            @if($color_id == 0)
        
            <div class="service_box_title" onclick="show_service()">

            	<span> {{$value->service_name}} </span> 

            	<span id="service_title_icon" class="icon"> </span> 

            </div>

            <?php $service_id = $value->id; break; ?>

                <!--  اگر رنگ داشت دنبال گارانتی ای با کد رنگ مورد نظر بگرد-->@else
                <?php 

                $check = DB::table('service')->where(['parent_id'=>$value->id,'color_id'=>

                $color_id])->first(); 

                ?>

                    <!--                 اگر پیدا کردی نشان بده-->
                    @if($check)

                    <div class="service_box_title" onclick="show_service()"> 
                    	
                    	{{$value->service_name}} 

                    	<span id="service_title_icon" class="icon">  </span> 
                    
                    </div>
                    
                    <?php
                      
                       $service_id = $value->id;
                      
                       $price =$check->price;
                     
                     break;

                     ?>
                    
                    @endif
               
                @endif
           
            @endforeach
               
                        <div class="service_box_body" id="service_box_body">
                           
                            @foreach($service as $key=>$value)
                                
                                <div onclick="set_service({{$value->id}})" class="service-item"> 

                                	{{$value->service_name}} 

                                </div>
                            
                            @endforeach
                        
                        </div>
        
        </div>

            <div class="clearfix"> </div>
            
    @endif
      <input type="hidden" value="{{$service_id}}" name="service_id" id="service_id">

    <!-- End section service -->

	     <div class="product_price_box"><!-- start section price -->
            
            <p>
                
                <span class="title">قیمت : </span>
                
                <span class="number">{{number_format($product->price)}}</span>
                
                <span>تومان</span>
            
            </p>
             
              @if(!empty($product->discounts))
                   
                   <p>
                       
                       <span class="title">قیمت برای شما :</span>
                       
                       <span class="number">

                       	{{number_format($product->price-$product->discounts)}}
                       
                       </span>
                       
                       <span>تومان   </span>
                   
                   </p>
            
            @endif
       
        </div><!-- end section price -->   
     
      </div>
	   </form>
	 @endif
	 
	 </div><!-- end section details -->

	 
	 	<div class="data_product_box" id="data_product_box">

	 		<ul class="tab_product_info" id="tab_product_info">

	 		<li onclick="show_tab(1)">مشخصات فنی</li>

	 		<li onclick="show_tab(2)">نقد و برسی  </li>

	 		<li onclick="show_tab(3)">نظرات   </li>

	 	</ul>
 
	 	
	  

	 	<div id="lavalamp-bar" class="lavalamp-bar">

	 	</div>
	 
	 	</div>
 
	  
<section id="tab_1">
	


	 	<div class="tab_item_product tab_box" >
	 		     @if(sizeof($items)>0)
           <div role="tabpanel" class="tab-pane " id="items">
           
            @foreach($items as $item)

                <section>
                    <h5><i class="fa fa-caret-left"></i>{{$item->name}}</h5>
                    <ul>
                        @foreach($item->childs as $child)
                            @if(!empty( $child->get_value_item->value))
                            <li>
                                <div>{{$child->name}}</div>
                                <div class="value">
                                    <?php $value = $child->get_value_item->value;
                                    $filed = $child->filed;
                                    ?>
                                        @if($filed =='1' )
                                            @if ($value == 1)
                                        <span class="fa fa-check alert-success"></span>
                                            @elseif($value == 2)
                                        <span class="fa fa-close alert-danger"></span>
                                            @elseif($value == 3)
                                        <span class="fa fa-check alert-success"></span>
                                            @elseif($value == 4)
                                        <span class="fa fa-close alert-danger"></span>
                                            @endif

                                </div>
                            </li>

                        @elseif($filed=='2')
                        <span>{{$value}}</span>
                   </div>
                   </li>

    @else
        <?php $arr = explode('@#!', $value);?> 
        @foreach($arr as $k=> $ar ) 
        @if(!empty($ar)) 
        @if($k==0)
            <span>   {{$ar}}   </span>

</li>
@else
    <li>

        <div class="value"><span>{{$ar}}</span></div>
    </li>
    @endif
    @endif
    @endforeach
    @endif
    @endif
    @endforeach
    </ul>
    </section>
    @endforeach
    
@endif
 </section>
	 	</div>




 
 @if(!empty($review))
<!--      !empty($review)-->
<div id="tab_2" class="tab_box">
	

      <div role="tabpanel" class="tab-pane  active " id="review">
       

     

      <?php

      $review_tozihat = $review->review_tozihat;
      $f = strpos($review_tozihat, 'start_review');
      $t = substr($review_tozihat, 0, $f);
     
      $t2 = substr($review_tozihat, $f, strlen($review_tozihat));
      $text = explode('start_review', $t2);
      foreach ($text as $key => $value) {
      if (!empty($value)) {
      $d = '<div class="review-title" onclick="show_review(' . $key . ')" id="review-title-' . $key . '"><span class="menha" id="review-span-' . $key . '"></span>';
      $v = str_replace('start_item', $d, $value);

      $d2 = '</div><div class="review-div" id="review-div-' . $key . '">';
      $v = str_replace('end_item', $d2, $v);
      echo nl2br(strip_tags($v, '<img> <p> <div><span>')) . '</div>';
      }
      }
      ?>

      <hr>
      </div>
      </div>
      @endif

<div id="tab_3" class="tab_box">
	
</div>

<button onclick="submit_form1()" class="btn btn-success btn_add_cart">افزودن به سبد خرید</button>
</div><!-- end section product -->

@stop

@section('footer')

<script type="text/javascript" src="{{ url('js/swiper.min.js') }}">
</script>
<script type="text/javascript" src="{{ url('js/TweenMax.min.js') }}">
	</script>

<script type="text/javascript">
	 @if($product->product_status==1)
    function set_service(service_id) {
 
        $("#service_box_body").slideUp('slow');

        $.ajax({
            url: '{{url('service/set_service ')}}'
            , type: 'POST'
            , data: {service_id: service_id,product_id: {{$product->id}}, color_id: {{$color_id}}
                , _token: '{{csrf_token()}}'}
            , success: function (r) {
                $("#show-service").html(r);

            }
       });
    }
@endif
</script>
<script type="text/javascript">
	  var swiper_0 = new Swiper('.swiper-container', {
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      }
    });
</script>
 
   <script type="text/javascript">
		function show_tab(id){
		$(".tab_box").hide();
		$("#tab_"+id).show();
		if(id==3){
		$("#dd").html(id);
		$.ajax({
		url:'{{ url('site/ajax_get_tab_data') }}',
		type:'POST',
		data:{product_id:{{ $product->id }},tab_id:'comments',_token:'{{ csrf_token() }}' },
		success:function(data){
		//$("#loading").hide();

		$("#tab_3").html(data);

		}
		});

		}
		}
			 
    
    	//$("#loading").show();
      
      $('#tab_product_info li').click(function() {
   	  var total_width = $("#tab_product_info").outerWidth();
   	    var width = $(this).outerWidth();
   	  var offset = $(this).offset().left;
   	   var left_offset = $("#tab_product_info").offset().left ;
   	    TweenMax.to($('#data_product_box #lavalamp-bar'),0.5,{
        css:{
        	width:width + 'px',
       	    right:(total_width - offset - width + left_offset) + 'px',
      }
     });
     
  
      });
        
    
    

    
      
   	 
 
   </script>  
 
 

@stop