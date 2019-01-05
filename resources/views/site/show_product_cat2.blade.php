@extends('layouts.site')

@section('header')
<link rel="stylesheet" type="text/css" href="{{ asset('css/ion.rangeSlider.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/ion.rangeSlider.skinNice.css') }}">

@stop

@section('content')

<div id="show_product_cat1">
	

	 <div class="row">
        
        <div class="col-md-3 pr0 box">

			<div  class="only_product_exist">
			<p onclick="set_status_product()">
			<span id="status_product_icon" class="check_filter"></span>
			<span>فقط کالاهای موجود : </span>
			<input type="checkbox" id="status_product" style="display: none;">

			</p>
			</div>

         @if($search_price['min_price'] != $search_price['max_price'])
			<div style="width: 100%;direction: ltr; text-align: center;
			border-bottom: 1px solid #e3e3e3;
			margin:auto;padding-top: 20px;padding-bottom: 20px;">
			<input type="text" id="example_id" name="example_id">

			<button style="margin-top: 20px;"  class="btn btn-primary" onclick="set_price_search()">
			اعمال محدوده قیمت
			</button>

			</div>

      @endif

			<div class="cat_list">
				<ul class="cat_list_ul">
					<li>
						<span class="fa fa-angle-left"></span>

						<a href="{{url('category').'/'.$category1->title_en.'/'.$category2->title_en}}"><span>{{$category2->title_fa}} </span></a>
				  <ul class="cat_list_ul">
				  	<?php $a=array(); ?>
				  @foreach ($cat_list as $key => $value) 
				             
                     @if(!array_key_exists($value->title_en,$a))
                     <li>
                     	<a href="{{url('category'.'/'.$category1->title_en.'/'.$category2->title_en.'/'.$value->title_en)}}">
                     		<span>{{$value->title_fa}}</span>
                     	</a>
                     </li>
                     @endif
                     <?php $a[$value->title_en]=1; ?>


				  @endforeach 
					
				  </ul>
					</li>
					
				
				</ul>
					
			</div>


        </div>
         
         <div class="col-md-9 pr0">

          <div class="box" style="margin-bottom: -12px">
          	 <div class="breadcum">
               <ul class="list-inline">
                   <li >
                      <a href="{{url('')}}">
                      فروشگاه اینترنتی دیجی آنلاین</a>
                      <span class="glyphicon glyphicon-chevron-right"></span>
                  </li>

                  <li>
                     <a href="{{url('category').'/'. $category1->title_en}}">
                      {{ $category1 ?  $category1->title_fa : '' }}</a>
                     <span class="glyphicon glyphicon-chevron-right"></span>
                   
                  </li>
                  <li>
                     <a href="{{url('category').'/'. $category1->title_en.'/'. $category2->title_en}}">
                      {{ $category2 ?  $category2->title_fa : '' }}</a>
                      
                   
                  </li>
  
              </ul>
         </div>
      


      <div class="search_product_div">

          <div class="col-md-6">

            <div>
                <label>({{ $category2 ? $category2->title_fa : '' }}</label>
                <span>نمایش </span>
                <span>1</span>
                <span>تا</span>
                <span>{{ sizeof($products) }} محصول</span>
                <span>از</span>
                <span>{{ $total_count }} محصول)</span>
            </div>

          </div>


          <div class=" col-md-6">
             <div class="search_div">
                  <input type="text" class="form-control search_input" placeholder="جستجو در نتایج ..." name="search_input" id="search_input">
              <span class="fa fa-search" onclick="search_product()"></span>
             </div>
          </div>
          <div class="clearfix"></div>
      </div>


    

       <div class="sorting">

        <span class="sorting_title"> مرتب سازی بر اساس : </span>

         <ul>

           <li onclick="sort_data(1)" id="sort_li_1">جدید ترین</li>

           <li onclick="sort_data(2)" id="sort_li_2">پربازدید ترین</li>

           <li onclick="sort_data(3)" id="sort_li_3">پرفروش ترین</li>

           <li onclick="sort_data(4)" id="sort_li_4">ارزانترین</li>


           <li onclick="sort_data(5)" id="sort_li_5">گرانترین </li>

         </ul>

        <div class="clearfix" ></div>

       </div>
          </div>
  
            <div id="show_product">
                @include('include.search',['products'=>$products])
            </div>

         </div>
    
    </div>
</div>

 <div id="loading">
    <span class="animation">

    </span>

</div>

@stop


@section('footer')
<script src="{{asset('js/list.min.js')}}">
</script>
<script type="text/javascript" src="{{ asset('js/ion.rangeSlider.min.js') }}">

</script>
<script type="text/javascript">
    <?php
$url = url('ajax/search_filter_product');
?>
    var product_status = 0;
    var type_sort = 1;
    var search_value='';
    var min_price = 0;
    var max_price = 0;

     
    

    function send_ajax(url) {
      var cat_id = {{$category2->id}};
        var j = 0;
        var checks_value = new Array;
        var checks = new Array;
        checks_value = [-1];
        
        var checks = document.getElementsByClassName('check_filter_product');
        for (var i = 0; i < checks.length; i++) {
            if (checks[i].checked) {
                checks_value[j] = checks[i].value;
                j++;
            }
        }


        $.ajax({
            url: url,
            type: 'POST',
            data: {
                checks_value: checks_value,
                product_status: product_status,
                type_sort: type_sort,
                search_value: search_value,
                min_price:min_price,
                max_price:max_price,
                 cat3_id:cat_id,
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {

                $("#loading").hide();
                $("#show_product").html(data);
            }
        });
    }



</script>


<script>
    $(".pagination a").click(function(event) {
        $("#loading").show();
        event.preventDefault();
        var url = $(this).attr('href');

        url = url.split('page=');
        var number_page = url[1];
        if (url.length == 2) {
            var ajax_url = '{{$url}}?page=' + number_page;

            send_ajax(ajax_url);
        }
    });

</script>

<script type="text/javascript">
    $(function() {
        $("[data-toggle='tooltip']").tooltip();
    });

   
   

</script>


<script type="text/javascript">
    function set_status_product() {

   $("#loading").show();
        var c = document.getElementById('status_product');
        var d = document.getElementById('status_product_icon');
        if (c && d) {
            c.checked = !c.checked;
            if (c.checked) {
                product_status = 1;
                d.className = 'check_filter_active';


            } else {
                d.className = 'check_filter';
                product_status = 0;

            }
        }

        send_ajax('{{$url}}');

    }

</script>

 
 
 
<script type="text/javascript">
    function sort_data(type){
    	$("#loading").show();
        type_sort = type;
         send_ajax('{{$url}}');
          $('.active_border').removeClass('active_border');
         $('#sort_li_'+type).addClass('active_border');
    }
</script>

<script type="text/javascript">
    search_product = function(){
    	$("#loading").show();
        var value = document.getElementById('search_input').value;
        if(value.trim() !=null){

        search_value = value;
        send_ajax('{{$url}}');

        }

    }
</script>
   @if($search_price['min_price'] != $search_price['max_price'])
<script type="text/javascript">
    var $range = $("#example_id");
    $range.ionRangeSlider({
            type:"double",
            min:{{ $search_price['min_price'] }},
            max:{{ $search_price['max_price'] }},
            from:{{ $search_price['min_price'] }},
            to:{{ $search_price['max_price'] }},
            step:100,
            onFinish:function(data){
              var c = data.from;
              var d = data.to;
              min_price = c;
              max_price=d;
            }
    });


    var set_price_search = function (){
    	$("#loading").show();
       send_ajax('{{$url}}');


    }
</script>
@endif
@stop
