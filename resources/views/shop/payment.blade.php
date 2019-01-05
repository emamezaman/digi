@extends('layouts.site')

@section('content')



<div class="payment_page box row">

	 {{-- header --}}

      <div class="payment_header">

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

    <div class="payment_body">

        <div style="border:1px solid #62B965;margin-bottom:25px;">
        <div  style="padding:20px;">

     
 
        <div class="col-md-4">
        <p style="margin-top:6px;">در صورتی که کارت هدیه دارید وارد نمائید.</p>
        </div>
        <div class="col-md-8">
        <input style="width:200px;border-radius:0!important;" type="text" id="gift_code" name="gift_code" class="form-control pull-right"   >
        <button type="button" onclick="send_gift_code('{{csrf_token()}}')" name="button" class="btn btn-primary" style="margin-right:5px;">بررسی</button>
        </div><div class="clearfix"></div>
        <div id="message_gift" style="margin-right: 13px;margin-top:15px;Display:none;margin-bottom:0!important;">

        </div>
        
              <?php

              $price1= \App\GiftCart::get_price();
              ?>

              <div style="margin-top: 20px;" class="alert alert-danger">
              کارت هدیه وارد شده صحیح می باشد مبلغ قابل پرداخت با توجه به تخفیف اعمال شده {{number_format($price1)}} تومان می باشد.
              </div>
        
        </div>
        </div>

      <div style="border:1px solid #62B965;margin-bottom:25px;">
        <div  style="padding:20px;">

     <?php   $d=Session::get('discount',0);    ?>
     @if($d==0)

        <div class="col-md-4">
            <p style="margin-top:6px;">در صورتی که کد تخفیف دارید وارد نمائید.</p>
        </div>
          <div class="col-md-8">
            <input style="width:200px;border-radius:0!important;" type="text" id="discount_code_value" name="discount_code" class="form-control pull-right"   >
            <button type="button" onclick="send_code('{{csrf_token()}}')" name="button" class="btn btn-primary" style="margin-right:5px;">بررسی</button>
          </div><div class="clearfix"></div>
          <div id="message_discount" style="margin-right: 13px;margin-top:15px;Display:none;margin-bottom:0!important;" class="alert alert-danger"></div>

    @else
    <?php
   
     $price2= \App\GiftCart::get_price();
     ?>
     <div class="alert alert-danger">
        کد تخفیف وارد شده صحیح می باشد مبلغ قابل پرداخت با توجه به تخفیف اعمال شده {{number_format($price2)}} تومان می باشد.
     </div>
    @endif
  </div>
</div>

    	 <div class="pay_title">
              <p> <span class="fa fa-caret-left"></span> انتخاب شیوه پرداخت</p>
        </div>
        @if(Session::has('error'))
        <p> </p>
         <div class="alert alert-danger">
          {{ Session::get('error') }}
        </div>
		@endif

        <form action="{{ url('payment') }}" method="post">
        	{{ csrf_field() }}
        <table>
        	<tr>
        		<td class="payment_first_td">
        			<div class="radio_control2" id="pay_radio_1"  onclick="set_pay(1)">
        				<label class="circle">

        				</label>

        			</div>
        		</td>
        		<td>
        			<p>
        				پرداخت اینترنتی (با تمامی کارت های عضو شتاب)
        			</p>
        			<div class="row">
						<div class="col-md-6 col-sm-6">
							<p class="pull-right pl15">
						<span class="radio_control" id="pay_radio_2" onclick="set_pay(2)">
						<label class="circle">
						</label>
						</span>
						<input type="radio" value="2" id="radio_2" name="pay_radio">
						<span>درگاه پرداخت اینترنتی  بانک سامان </span>
						</p>

						<p class="pull-right pl15">
						<span class="radio_control2" id="pay_radio_3" onclick="set_pay(3)">
						<label class="circle">
						</label>
						</span>
						<input type="radio" id="radio_3" checked="true" value="3" name="pay_radio">
						<span>درگاه پرداخت اینترنتی  بانک ملت </span>
						</p>
						</div>

						<div class="col-md-6 col-sm-6">
							<p class="pull-right pl15">
						<span class="radio_control" id="pay_radio_4" onclick="set_pay(4)">
						<label class="circle">
						</label>
						</span>
						<input type="radio" value="4" id="radio_4" name="pay_radio">
						<span> درگاه پرداخت اینترنتی زرین پال </span>
						</p>

						</div>
        			</div>
        		</td>
        	</tr>
        </table>

         <table>
        	<tr>
        		<td class="payment_first_td">
        			<div class="radio_control" id="pay_radio_5"  onclick="set_pay(5)">
        				<label class="circle">

        				 </label>
        				<input type="radio" id="radio_5" value="5" name="pay_radio">
        			</div>
        		</td>
        		<td>

        			<p>پرداخت در محل   </p>
        			<p>
        				برای سفارش هایی که از طریق باربری ارسال میشوند یا مبلغ آن ها بیشتر از سی میلیون ریال است  ، لازم است یکی از روشهای پرداخت اینترنتی یا کارت به  کارت انتخاب و  پیش از ارسال میلغ آن   تصویه شود.
        			</p>
        		</td>
        	</tr>
        </table>

           <table>
        	<tr>
        		<td class="payment_first_td">
        			<div class="radio_control" id="pay_radio_6"   onclick="set_pay(6)">
        				<label class="circle">

        				</label>
        				<input type="radio" value="6" id="radio_6" name="pay_radio">
        			</div>
        		</td>
        		<td>
        			<p>کارت به کارت </p>
        			<p>
        				شما میتوانید وجه سفارش خود را به صورت انتقال وجه کارت به کارت پرداخت نموده و حداکثر تا 24 ساعت پس از سفارش اطلاعات آن را ثبت نمائید.
        			</p>
        		</td>
        	</tr>
         </table>

          <table>
        	<tr>
        		<td class="payment_first_td">
        			<div class="radio_control" id="pay_radio_7"  onclick="set_pay(7)">
        				<label class="circle">

        				</label>
        				<input type="radio" value="7" id="radio_7" name="pay_radio">
        			</div>
        		</td>
        		<td>
        			<p>  واریز به حساب  </p>
        			<p>
        				 شما میتوانید وجه سفارش خود را به شعب بانک به حساب شرکت فن آوازه واریز کرده و حداکثر تا 24 ساعت پس از سفارش اطلاعات آن را ثبت نمائید.
        			</p>
        		</td>
        	</tr>
        </table>
        <p></p>
<div>
	<input type="submit" value="ثبت نهایی " class="btn btn-success" name="">
</div>
        </form>
    </div>
    	</div>

@endsection

@section('footer')
<script type="text/javascript">
	function set_pay(id){

		for (var i = 1; i < 8 ; i++){

         var r= document.getElementById("pay_radio_"+ i);
         if(r){
         	r.className="radio_control";
         }
		}
		if(id==1){
			 document.getElementById('pay_radio_' + id).className='radio_control2';
			 document.getElementById('pay_radio_3').className='radio_control2';
			 document.getElementById('radio_3').checked=true;


		}else if(id==2 || id==3 || id==4 ){
	 document.getElementById('pay_radio_1').className='radio_control2';
     document.getElementById('pay_radio_' + id).className='radio_control2';
	 document.getElementById('radio_' + id).checked=true;

		}else{

     document.getElementById('pay_radio_' + id).className='radio_control2';
	 document.getElementById('radio_' + id).checked=true;
		}






}
</script>
@endsection
