@extends('mobile.layout')

@section('header')
<link rel="stylesheet" type="text/css" href="{{ url('css/swiper.min.css') }}">
@stop

@section('content')
 
		<div class="swiper-container" style="direction: ltr;" >
    <div class="swiper-wrapper">
     	@foreach($images as $key=>$value)
		 <div class="swiper-slide">
		 	
		<img   src="{{ url('upload/product_image').'/'.$value->url }}">
		 	
		 </div>

		@endforeach
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Arrows -->

    
  </div>
 
@stop

@section('footer')

<script type="text/javascript" src="{{ url('js/swiper.min.js') }}">
	
</script>
<script type="text/javascript">
	  var swiper = new Swiper('.swiper-container', {
      pagination: {
        el: '.swiper-pagination',
        clickable: true
      }
    });
</script>



 
     
 

@stop
