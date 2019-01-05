@extends('layouts.site')

@section('title','سبد خرید شما')

@section('content')
<div class="cart">



        <div id="box_cart">
    {{-- با این متد تمام موجودی سبد خرید را میخوانیم --}}
    <?php $cart_data = App\Cart::get(); ?>

        @if(sizeof($cart_data)==0)

    <div class="alert alert-danger">سبد خرید شما خالی است</div>
        @else
         <div class="top_title">
             <p><i class="fa fa-caret-left"></i>سبد خرید شما در دیجی آن لاین  </p>
             <p>افزودن کالاها به معنی  رزرو کالا برای شما نیست  برای ثبت سفارش باید مراحل بعی سفارش را تکمیل نمائید.</p>
             <a href="{{ url('shipping') }}" class=" btn btn-success">ادامه ثبت سفارش<span class="fa fa-arrow-left"></span></a>
         </div>

       	 <div class="table-responsive">
       	 	<table id="cart_table" class="table table-bordered table-hover cart_table">
        	<thead>
        		<tr>
        			<th>شرح محصول</th>
        			<th>تعداد</th>
        			<th>قیمت واحد</th>
        			<th colspan="2">قیمت کل</th>

        		</tr>
        	</thead>
        	<tbody>

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
                        // با این متد مشخصات محصول و گارانتی و رنگ را میخوانیم
                          $data = App\Cart::getData($key,$service_id,$color_id);
        		  ?>
        				@if($data)
        		  	<tr>
        			<td class="cart-product-info  ">


        				<div class="box-product-info ">
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
        				<select class="form-control" onchange="setProduct({{ $key }},{{ $s_c[0] }},{{ $s_c[1] }},this.value)">
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
        			<td class="last">
                        <div>
                            <span class="fa fa-remove" 
                    onclick="delProductCart({{ $key }},{{ $s_c[0] }},{{ $s_c[1] }})">
                
            </span></div></td>
        		</tr>
                <?php  
                 $total_price += $data['price'] * $value2; 
                 $discounts_price += ($data['discounts_price'] * $value2); 
                 ?>
        		@endif
        		  @endforeach
        		@endforeach

        	</tbody>
        </table>
       	 </div>
{{--  show price --}}
<?php   
Session::put('total_price',$total_price);
Session::put('price',$discounts_price);

?>
<div  class="row">
    <div class="col-md-5"></div>
    <div class="col-md-7">
        <div class="cart_price">
            <div>
                <ul class="list-inline">
                    <li>   <span class="title">هزینه کل  </span>   </li>
                    <li class="pull-left"><span class="number">{{ number_format($total_price) }}</span> <span class="unit">تومان   </span></li>
                </ul> 
            </div><i class="clearfix"></i>
            <div class="bottom">
                <ul class="list-inline">
                    <li><span class="title">هزینه  قابل پرداخت   </span>   </li>
                <li class="pull-left"> <span class="number">{{ number_format($discounts_price) }}</span> <span class="unit">تومان</span></li>
                </ul> 
            </div>
        </div>
    </div>
</div>
{{--  --}}
        @endif
    </div>

</div>




@endsection
@section('footer')
<?php  
 $url = url('site/del_ajax_cart');
 $url2 = url('site/set_ajax_cart');
 
 ?>
<script type="text/javascript">
   
 //با این متد میتوان یک محصول را کامل از سبد خرید حذف کرد
function delProductCart(p_id,s_id,c_id){
 if(!confirm('آیا مایل به حذف هستید؟'))
    return false;
   $.ajax({
            url:'{{ $url }}',
            type:'POST',
            data:{service_id:s_id,product_id:p_id,color_id:c_id ,_token:'{{ csrf_token() }}'},
            success:function(r){

             $("#box_cart").html(r);
        }
        });
}


/*با این متد تعدا هر محصول در سبد خرید را میتوان تغییر داد */
function setProduct(p_id,s_id,c_id,value){
 
   $.ajax({
            url:'{{ $url2 }}',
            type:'POST',
            data:{service_id:s_id,product_id:p_id,color_id:c_id ,value:value,_token:'{{ csrf_token() }}'},
            success:function(r){

             $("#box_cart").html(r);
        }
        });

}

</script>
@endsection
        
   



