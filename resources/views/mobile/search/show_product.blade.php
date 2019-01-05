@extends('mobile.layout')

@section('header')
<link rel="stylesheet" type="text/css" href="{{asset('css/toggles-full.css')}}">

@stop

@section('content')

<div id="show_product">

	<div class="loading_div" style="margin-top: -70px;">
		<div class="loading">

		</div>
	</div>

	<div class="filter_box">

		<div class="filter_header_box">

			<span  class="pull-right cat_name">{{ $category3->title_fa }}</span>

			<span class="fa fa-close pull-left" onclick="hide_filter_box()" ></span>

		</div>
		<div class="clearfix"></div>
 
       <div id="filter_inline" >

       	<ul class="list-inline">
         <li onclick="show_child_filter(0)">
          بر اساس قیمت
         </li>
       		 @foreach ($filters as $filter)
       		     <li onclick="show_child_filter({{ $filter->id }})">
       		     	{{ $filter->name }}
       		     </li>
       		 @endforeach
       	</ul>

       </div>
 
  <div class="filter_child_box" id="filter_child_box_0" style="display: block;">
    @if( $search_price['min_price']>0 && $search_price['max_price'])
        <?php 
        $n = $search_price['max_price'] / $search_price['min_price'];
               if($n>0){
                     $n = intval($n);
                     
                     $price = array();
                     $price1= $search_price['min_price'];
                      $price2= $search_price['max_price'];
                      $p1=$price1;
                      $p2=$p1;
                     for ($i=0; $i <$n ; $i++) { 
                      $p2 = $p2 + $price1;
                      ?>
                    <div style="border-bottom: 1px solid silver; padding:10px 0px;" >
                       <span class="pull-right">
                         <span> {{ $p1 }}</span><span>-</span>
                         <span>{{$p2}}</span><span> تومن</span>
                         
                       </span> 
                  <input class="checkbox_price_filter"  type="checkbox" value="{{$p1}}_{{$p2}}" id="checkbox_price_filter_{{$i}}" style="display: none;"> 

                     <span id="check_filter_{{$i}}"  style="float:left;"
                            class="check_filter" onclick="set_price_filter({{$i}})">

                      </span>
                      <div class="clearfix"></div>
                      </div> 
                      <?php
                        
                      $p1= $p2;
                        
                        
                      } 
               }
        ?>
    @endif
 
  </div>
                     


                         
	@foreach ($filters as  $key=>$filter)
      <div class="filter_child_box" id="filter_child_box_{{  $filter->id  }}">

          <div >

      	@foreach ($filter->childs as $value)

          		<div style="border-bottom: 1px solid silver; padding-bottom: 10px;">
              <p >
                    @if($value->filed==1)

                     <span class="pull-right">

                      {{ $value->name }}

                     </span>


                          <span id="check_filter_{{ $value->id }}"  style="float: left;"

                            class="check_filter" onclick="set_filter( {{ $value->id }})">

                          </span>

                           <input type="checkbox" value="{{ $filter->ename }}_{{ $value->id }}"

                            id="filter_checkbox_{{ $value->id }}" class="check_filter_product">

                             @else

                             <input type="checkbox" value="{{ $filter->ename }}_{{ $value->id }}"

                              id="filter_checkbox_{{ $value->id }}" class="check_filter_product">

                              <span data-toggle="tooltip" data-placement="top" class="label_color pull-right"



                              title="{{ $value->name }}" style="background:#{{ $value->ename }}">

                              </span>
                              

                              <span id="check_filter_{{ $value->id }}"  style="float: left;"

                            class="check_filter" onclick="set_filter( {{ $value->id }})">

                          </span>

                             @endif

                    <div class="clearfix"></div>

              </p>  
              </div>

      	@endforeach


          </div>

      </div>

	@endforeach
		<?php  $url = 'ajax/search_filter_product'; ?>

    <div style="position: fixed;bottom: 0;width: 100%;">

        <div style="float: right; margin-bottom: 10px;margin-right: 10px;">

        <button onclick="remove_all_filter('{{ $url }}','{{ Session::token() }}',{{$category3->id}})" 
        class="btn btn-default">
        حذف همه فیلترها
        </button>

        </div>

        <div style=" float: left;margin-left: 10px;margin-bottom: 10px;"">
        <div class="toggle-light">

        </div>
        </div>
  <div class="clearfix"></div>

	<button class="btn btn-primary btn_filter" onclick="   send_ajax('{{ $url }}','{{ Session::token() }}',{{$category3->id}});">
		فیلتر کن
	</button>
</div>

	</div>


<div class="sort_product">
 <span class="pull-right">
   {{$category3->title_fa}}
 </span>
 <span class="fa fa-sort-amount-desc"></span>
 <div class="sort_select">
   <select id="sort_select" 
   onchange="sort_product('{{ $url }}','{{ Session::token() }}',{{$category3->id}})">
     <option value="1">جدید ترین</option>
     <option value="2">پربازدید ترین</option>
     <option value="3">پرفروش ترین</option>
     <option value="4">ارزانترین</option>
     <option value="5">گرانترین </option>
   </select>
 </div>
</div>
 



	<div id="list_product">
		   @include('mobile.include.search',['products'=>$products])
		
	</div>



<button onclick="show_filter_box()" class="btn btn-default btn_filter" id="btn_filter" style="position: fixed;bottom: 0;">
  <span>فیلتر کن</span> <span></span>
</button>

</div>
@stop
@section('footer')
<script type="text/javascript" src="{{asset('js/toggles.min.js')}}">

</script>
  
@stop
    
 
