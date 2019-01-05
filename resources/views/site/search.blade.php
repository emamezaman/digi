@extends('layouts.site')

@section('header')
<link rel="stylesheet" type="text/css" href="{{ asset('css/ion.rangeSlider.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/ion.rangeSlider.skinNice.css') }}">

@stop

@section('content')

<div id="page-search"  >
    <div class="row">
        <div class="col-md-3 pr0">
            <div class="filter_box box">
                @if(sizeof($filter_ids)>0)
                <div id="filter_name_box">
                    <p class="black"><b>ﺎﻤﺷ ﺏﺎﺨﺘﻧا</b></p>
                    @foreach ($filter_ids as $key=>$value) @if(!empty($value))
                    <div class="filter_name" onclick="remove_filter_name({{$key}});" id="filter_name_{{$key}}">
                        {{ $value->name }}
                        <span class="icon_close fa fa-remove"></span>
                    </div>
                    @endif @endforeach
                </div>
                @endif
                <?php
                    $f_ids=array();
                    ?>

                    <div style="padding-right:10px;padding-bottom: 15px;margin-top: 15px; border-bottom: 1px solid #e3e3e3;">
                        <p onclick="set_status_product()">
                            <span id="status_product_icon" class="check_filter"></span>
                            <span>ﺩﻮﺟﻮﻣ یﺎﻫﻻاک ﻂﻘﻓ : </span>
                            <input type="checkbox" id="status_product" style="display: none;">

                        </p>
                    </div>

                       <div style="width: 95%;direction: ltr; text-align: center;
                       border-bottom: 1px solid #e3e3e3;
                       margin:auto;padding-top: 20px;padding-bottom: 20px;">
                            <input type="text" id="example_id" name="example_id">

                                <button style="margin-top: 20px;"  class="btn btn-primary" onclick="set_price_search()">
                                    اعمال محدوده قیمت
                                </button>

                        </div>

           


                    <ul>
                        <?php $f_ids=array() ;?> @foreach ($filter as $key=>$value)
                        <li class="filter" id="filter_div_{{ $value->id }}">
                            <?php  $f_ids[$key]=$value->id ;?>
                            <span onclick="filter_show_hide({{ $value->id }})" class="filter-name">
               <b> {{ $value->name }}</b>
                        <i class="fa fa-angle-down" id="icon_angle_{{ $value->id }}"></i>
               </span>

                            <ul class="filter-child_box list" id="filter_child_div_{{ $value->id }}">


                                @foreach ($value->childs as $key2=>$value2)
                                <li class="filter-child @if($value2->filed==2) pull-right @endif" onclick="set_filter('{{ $value2->name }}',{{ $value2->id }})">
                                    @if($value2->filed==1)
                                    <span id="check_filter_{{ $value2->id }}" @if(array_key_exists($value2->id, $filter_ids))
                              class="check_filter_active"
                              @else class="check_filter" @endif">
                           </span>

                                    <input onclick="" type="checkbox" @if(array_key_exists($value2->id, $filter_ids)) checked="true" @endif value="{{ $value->ename }}_{{ $value2->id }}" id="filter_checkbox_{{ $value2->id }}" class="check_filter_product">

                                    <span class="test">
                                {{ $value2->name }}
                            </span> @else
                                    <input type="checkbox" @if(array_key_exists($value2->id, $filter_ids)) checked="true" @endif value="{{ $value->ename }}_{{ $value2->id }}" id="filter_checkbox_{{ $value2->id }}" class="check_filter_product">
                                    <span data-toggle="tooltip" data-placement="top" class="label_color" title="{{ $value2->name }}" style="background:#{{ $value2->ename }}">

                              </span> @endif


                                </li>

                                @endforeach
                            </ul>
                            <div class="clearfix"></div>
                        </li>
                        @endforeach

                    </ul>
            </div>
        </div>

        <div class="col-md-9 pr0">

            
 <div class="box" style="margin-bottom: -12px;">
      <div class="breadcum">
               <ul class="list-inline">
                   <li >
                      <a href="">فروشگاه اینترنتی دیجی آنلاین</a>
                      <span class="glyphicon glyphicon-chevron-right"></span>
                  </li>

                  <li>
                     <a href="">{{ $category1 ?  $category1->title_fa : '' }}</a>
                     <span class="glyphicon glyphicon-chevron-right"></span>
                  </li>

                  <li>
                     <a href="">{{ $category2 ? $category2->title_fa : '' }}</a>
                     <span class="glyphicon glyphicon-chevron-right"></span>
                  </li>
                  <li>
                    <a href="">{{ $category3 ? $category3->title_fa : '' }}</a>
                  </li>
              </ul>
         </div>
      


      <div class="search_product_div">

          <div class="col-md-6">

            <div>
                <label>({{ $category3 ? $category3->title_fa : '' }}</label>
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
    <div class="compare" id="compare_product">

        <div class="number_compare_box" id="number_compare_box"

          onclick="show_hide_compare_product()">

            ﻪﺳیﺎﻘﻣ <span id="number_compare">0</span> ﺩﺭﻮﻣ
        </div>

        <div class="col-md-10" id="items_compare">

        </div>
        <div class="col-md-2 text-center">
            <div class="form-group">
            <button style="margin-top:5px;" class="btn btn-primary" id="remove_compare" onclick="cancel_compare()">
                ﻑاﺮﺼﻧا
            </button>
            </div>
            <div>
                <a  class="btn btn-success" id="product_compare_links">
                    ﺩﺭﻮﻣ (2) ﻪﺳیﺎﻘﻣ
                </a>
            </div>
        </div>




    </div>
</div>

 <div id="loading">
    <span class="animation">

    </span>

</div>


@endsection


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
    var number_compare = 0;
    var product_compare_list = '';
    var type_sort = 1;
    var search_value='';
    var min_price = 0;
    var max_price = 0;

    function send_ajax(url) {

        var j = 0;
        var checks_value = new Array;
        var checks = new Array;
        checks_value = [-1];
        var cat3_id = {{$category3->id}};
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
                cat3_id:cat3_id,
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {

                $("#loading").hide();
                $("#show_product").html(data);
            }
        });
    }



    function set_filter(filter_name, id2) {
        $("#loading").show();
        var c = document.getElementById('check_filter_' + id2);
        var c2 = document.getElementById('filter_checkbox_' + id2);
        if (c && c2) {
            if (c.className == "check_filter") {
                c.className = "check_filter_active";
                c2.checked =true;
                html = '<div class="filter_name" onclick="remove_filter_name(' + id2 + ')" id="filter_name_' + id2 + '">' + filter_name + '<span class="icon_close fa fa-remove"></span></div>';
                $("#filter_name_box").append(html);

            } else if (c.className = "check_filter_active") {
                c.className = "check_filter";
                c2.checked = false;
                $("#filter_name_" + id2).remove();
            }
        }

                send_ajax('{{$url}}');
        
    }
            
         



    function remove_filter_name(id2) {
        $("#loading").show();
        $("#filter_name_" + id2).remove();
        var c = document.getElementById('check_filter_' + id2);
        if (c) {
            c.className = "check_filter";
        }
        var c2 = document.getElementById('filter_checkbox_' + id2);
        if (c2) {

            c2.checked = false;
        }
        send_ajax('{{$url}}');
    }

</script>

<script>
    var options = {
        valueNames: ['test']
    };
    @foreach($f_ids as $key => $value)

    var list_ {
        {
            $key
        }
    } = new List('filter_div_{{$value}}', options);
    @endforeach

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

    function filter_show_hide(id) {
        var d = $("#filter_child_div_" + id);
        if (d) {
            d.toggle('slow');
        }
        var c = document.getElementById('icon_angle_' + id);
        if (c) {
            if (c.className == 'fa fa-angle-down') {
                c.className = 'fa fa-angle-up';

            } else if (c.className == 'fa fa-angle-up') {
                c.className = 'fa fa-angle-down';
            }
        }
    }
    <?php
         $a = array();
         foreach ($filter_ids as $key =>$value){
           $a[$value->parent_id]=$value->parent_id;
        }

        $a = array_unique($a);
         ?>
    @foreach($a as $key => $value)
    $("#filter_child_div_{{ $value }}").css('display', 'block');
    document.getElementById('icon_angle_{{ $value }}').className = "fa fa-angle-up";
    @endforeach

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
    $(".product_item_search").hover(function() {

            $(".product_item_compare", this).css('visibility', 'visible');

        },
        function() {

            $(".product_item_compare", this).css('visibility', 'hidden');

        });

</script>

<script type="text/javascript">
    function add_compare_product(title_product, id, img) {

        var c = document.getElementById('checkbox_compare_' + id);

        if (c) {

            if (c.className == "ok_checkbox") {

                if (number_compare < 4) {
                    c.className = "active_checkbox";
                    number_compare = number_compare + 1;
                    product_compare_list = product_compare_list +"/DKP-"+id;
                    var span =  'ﻪﺳیﺎﻘﻣ ( '+number_compare+') ﺩﺭﻮﻣ';
                    $("#product_compare_links").html(span);
                    var href='{{url('compare')}}'+product_compare_list;
                    $("#product_compare_links").attr('href',href);
                    if (title_product.length > 30) {

                        title_product = title_product.substr(0, 30) + "...";

                    }
             var html = '<div id="item_compare_' + id + '" class="item_compare">' +
            '<div class="product_img">'+
            '<span class="fa fa-remove" title="حذف " onclick="del_product('+id+')"></span><img src="{{ url('upload/product_image').'/'}}' + img + '"></div>' +
                        '<p class="title">' + title_product + '</p></div>';
                    $("#items_compare").append(html);

                } else {
                    alert('ﺩیﺉﺎﻤﻧ ﻪﻓﺎﺿا ﻪﺳیﺎﻘﻣ ﺖﺳیﻝ ﻪﺑ ﺩیﻥاﻮﺗیﻡ اﺭ ﻝﻮﺼﺤﻣ 3 ﺮﺛکاﺪﺣ.');

                }

                $("#number_compare").text(number_compare);
                $("#number_compare_box").css('display','block');

            } else {

                c.className = "ok_checkbox";
                number_compare = number_compare - 1;
                $("#item_compare_" + id).remove();

                 var span =  'ﻪﺳیﺎﻘﻣ ( '+number_compare+') ﺩﺭﻮﻣ';
                    $("#product_compare_links").html(span);
                     product_compare_list = product_compare_list.replace('/DKP-'+id,'');
                      var href='{{url('compare')}}'+product_compare_list;
                    $("#product_compare_links").attr('href',href);

                if (number_compare > 0) {

                    $("#number_compare").text(number_compare);
                    $("#number_compare_box").css('display','block');

                } else {
                    $("#number_compare_box").css('display','none');
                    $("#compare_product").css('height','0px');

                }


            }
        }
    }

</script>

<script type="text/javascript">

    show_hide_compare_product = function() {
        var c = $('#compare_product');
        if (c) {
            if (c.height() == 230) {
                c.height(0);

            } else {
                c.height(230);

            }
        }
    }

</script>

<script>
function cancel_compare(){
    var a = product_compare_list.split('/');
    for(var i=0;i<a.length;i++){
        if(a[i].trim() !=''){
            b=a[i].split('-');
            if(b.length==2 && b[0]=="DKP"){
                $("#item_compare_"+b[1]).remove();
                document.getElementById('checkbox_compare_' + b[1]).className="ok_checkbox";

            }
        }


    }
    $('#compare_product').height(0);
    number_compare = 0;
     product_compare_list = '';
    $("#number_compare_box").hide();

}


</script>
<script type="text/javascript">
    function del_product(id){
        $("#item_compare_"+id).remove();
        if( number_compare >0){
             number_compare =  number_compare - 1;
        }
         var span =  'ﻪﺳیﺎﻘﻣ ( '+number_compare+') ﺩﺭﻮﻣ';
                    $("#product_compare_links").html(span);
                     product_compare_list = product_compare_list.replace('/DKP-'+id,'');
                      var href='{{url('compare')}}'+product_compare_list;
                    $("#product_compare_links").attr('href',href);

                    if(number_compare == 0){
                        $('#compare_product').height(0);
                        $("#number_compare_box").hide();

                    }

             $('#checkbox_compare_' + id).addClass('ok_checkbox');
             $('#checkbox_compare_' + id).removeClass('active_checkbox');
             $("#number_compare").text(number_compare);


    }
</script>
<script type="text/javascript">
    function sort_data(type){
        type_sort = type;
         send_ajax('{{$url}}');
          $('.active_border').removeClass('active_border');
         $('#sort_li_'+type).addClass('active_border');
    }
</script>

<script type="text/javascript">
    search_product = function(){
        var value = document.getElementById('search_input').value;
        if(value.trim() !=null){

        search_value = value;
        send_ajax('{{$url}}');

        }

    }
</script>

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
       send_ajax('{{$url}}');


    }
</script>










@stop
