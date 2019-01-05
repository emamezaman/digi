@extends('layouts.site')

@section('content')
<div id="user_panel" class="box">
	<div class="col-md-3 pr0 pl0">
	<aside class=" side_bar">
        <ul>
                <li><a href="{{url('user/my_order')}}">سفارشات من</a></li> 
                <li><a href="{{url('user/gift_cart')}}">کارت های هدیه من</a></li> 
                 <li><a href="{{url('user/my_heart')}}">لیست مورد علاقه من</a></li> 
                 <li><a href="{{url('user/my_comment')}}">نظرات من</a></li> 
                 <li><a href="{{url('user/my_question')}}">پرسش های من</a></li> 
                 <li><a href="{{url('user/my_digi_bon')}}">دیجی بن های  من</a></li> 
                 <li><a href="{{url('user/my_address')}}">آدرس  من</a></li> 
                 <li><a href="{{url('user/my_message_send')}}">پیام های ارسالی من</a></li> 
                 <li><a href="{{url('user/my_message_get')}}">پیام های دریافتی من</a></li> 
                <li><a href="{{url('user/my_message_new')}}">جدید ترین پیام های من</a></li>
      </ul>
         
	</aside>
</div>
<div class="col-md-9 pr0">
	<section class=" ">
		@yield('user') 
	</section>
</div> <div class="clearfix"></div>
</div>
@stop