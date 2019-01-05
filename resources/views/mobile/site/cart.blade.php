@extends('mobile.layout')

@section('header')
 
@stop

@section('content')

<div   class="loading_div" >

	 <di class="loading">
		
	</div>

</div>

<div id="cart">
	
	  <?php $cart_data = App\Cart::get(); ?>

	    @if(sizeof($cart_data) == 0)

            <div class="alert alert-danger alert_cart"  >

            	سبد خرید شما خالی است   
           
           </div>

        @else
         
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
                    
                          $data = App\Cart::getData($key,$service_id,$color_id);

        	  ?>

        	  @if($data)
                 
                 <div class="cart_box ">
                 	
                 	<div class="col-xs-5 " >
                 		
                       <img src="{{ asset('upload/product_image') . '/'.$data['img'] }}">

                 	</div>

                 	<div class="col-xs-7  pr0">

                 		<p class="del_product_icon">
                 			<span class="fa fa-trash"  onclick="delProductCart({{ $key }},{{ $s_c[0] }},{{ $s_c[1] }},'{{ Session::token() }}')">
                 				
                 			</span>
                 		</p>

                 		<div class="clearfix"></div>
                 		
                 		<p class="title_product">

							<a href="{{ url('product').'/'.$data['code_url'].'/'.$data['title_url'] }}">

								{{ $data['title'] }}

							</a>

        				</p>

        				<p class="code_product">

        						<a href="{{ url('product').'/'.$data['title_url'].'/'.$data['code_url'] }}">

        							{{ $data['code'] }}

        						</a>
        				</p>

        				@if($data['service_name'])

                                 <p>
                                 	  <span>  گارانتی :   </span>

                                      {{ $data['service_name'] }}

                                 </p>
        				@endif

        				@if($data['color_code'])

        						<p class="box_color">

	                                   <span class="title_color">

	                                   رنگ :

	                                  </span>

	        						<label style="background-color:#{{ $data['color_code'] }}">
	        							
	        						</label>

	                                <span class="name">

	                                     {{ $data['color_name'] }}

	                                </span>

        						</p>
        				@endif
  
                          <p class="cart_number_product">
                          	
                          	<span class="title">تعداد : </span>
                          
                             <label class="cart_number">

                             	<span class="add_btn"
                             	 onclick="setProduct({{ $key }},{{ $s_c[0] }},{{ $s_c[1] }},{{ $value2 + 1 }},'{{ Session::token() }}')" >
                               +</span>
                             	<span class="number_product"> {{ $value2 }}</span>
                             	<span class="remove_btn"
                                onclick="setProduct({{ $key }},{{ $s_c[0] }},{{ $s_c[1] }},{{ $value2 - 1 }},'{{ Session::token() }}')"
                             	>-</span>

                             </label>

                          </p>

                 	</div>
                         
        				 <div class="cart_product_price">
                          	
                          	<table class="table-bordered table">

                          		<tr>

                          			<td>
                          				<span>قیمت واحد  </span>
                          			</td>

                          			<td>
                          				<span>{{ number_format($data['price']) }}</span>

                          				  <span>تومان</span>

                          			</td>

                          		</tr>

                          		<tr style="color:#4caf50">

                          			<td>
                          				<span>قیمت کل  </span>
                          			</td>

                          			<td>
                          				<span>

                          				    {{ number_format($data['price'] * $value2) }}

                          			    </span>

                          			    <span>تومان</span>

                          			</td>

                          		</tr>

                          	 
                          	</table>
                          </div>
                 	 


                 	<div class="clearfix"></div>

                 	
                 
                 </div>

                  <?php 

                    $total_price += $data['price'] * $value2; 

                    $discounts_price += ($data['discounts_price'] * $value2); 

                 ?>

               @endif

             @endforeach

             @endforeach
            
             <button class="btn btn-success">
                      ادامه ثبت سفارش
                         <span class="fa fa-arrow-left"></span>
             </button>

        @endif

</div>

@stop