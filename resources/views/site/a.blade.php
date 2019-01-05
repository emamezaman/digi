@extends('layouts.site')

@section('title','سبد خرید شما')

@section('content')
<div class="cart">


	<?php $cart_data = App\Cart::get(); ?>

		@if(sizeof($cart_data)==0)

	<div class="alert alert-danger">سبد خرید شما خالی است</div>
        @else

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



        		@foreach ($cart_data as $key=>$value)

        		  @foreach ($value as $key2=> $value2)
        		  <?php
                          $s_c = explode('_', $key2);
                          $service_id = $s_c[0];
                          $color_id = $s_c[1];
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
        				<select class="form-control">
        					@for ($i = 1; $i <=30 ; $i++)
        						<option {{ $value2==$i ? 'selected="selected"' : '' }} value="{{$i}}"> {{$i}} </option>
        					@endfor
        				</select>
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
        			<td class="last"><div><span class="fa fa-remove"></span></div></td>
        		</tr>
        		@endif
        		  @endforeach
        		@endforeach
        	</tbody>
        </table>
       	 </div>

		@endif

</div>



@endsection
