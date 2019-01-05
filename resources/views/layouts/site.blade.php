<!doctype html>
<html lang="en">

<head>
    <title>فروشگاه اینترنتی دیجی آنلاین</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-select.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-rtl.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/dropzone.min.css')}}">
    @yield('header')
    <link rel="stylesheet/less" href="{{asset('css/main.less')}}">
     {{-- <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"> --}}



</head>

<body>

<!-- =========   begin header ========= -->
    <div class="container-fluid header">

        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-9 ">
                    <ul class="list-inline">
                        <li>
                            <span class="fa fa-lock"></span> 
                            <span>فروشگاه اینترنتی دیجی استایل ،</span> 
                            @if(Auth::check())
                            <a  href="{{ url('logout') }}" style="color: red" 
                              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();" title="خروج ">
                              <span class=""></span>
                                خروج
                            </a>

                            <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                            </form>

                             @else
                            <a href=" {{ route('login') }} " title="ورود">وارد شوید</a> 
                            @endif
                          </li>
                        <li>
                       @if(Auth::check())
                          <span class="fa fa-user"></span> 
                         <a href="{{url('user')}}" style="color: green" title="ورود به پنل کاربری">
                           <span>سلام،</span>
                          {{ Auth::user()->username }}
                           <span>،خوش آمدی</span>
                         </a>
                         @else
                         
                         <a href="{{route('register')}}">
                         
                         ثبت نام کنید
                       </a> 
                       @endif

                      </li>
                        <li><span class="fa fa-gift"></span> <a href="">کارت هدیه</a> </li>
                        <!-- <li>
                          <span class="fa fa-percent"></span> <a href="">پیشنهاد های شگفت انگیز</a> </li>
 -->
                    </ul>
                    <ul class="list-inline">
                        <li>
                           <a href="{{ url('cart') }}">
                                <div class="btn-shopping-cart">
                                <div class="shopping-cart-icon">
                                    <span class="fa fa-shopping-cart"></span>
                                </div>
                                <div class="shopping-cart-text">
                                    <span class="title">سبد خرید</span>
                                    <span class="number-product-cart">
                                      <?php   $count = App\Cart::count();
                                 echo $count ? $count : 0 ;
                                      ?>


                                    </span>
                                </div>
                            </div>
                           </a>

                        </li>

                           <li>
                           <div id="header-search" class="form-group ">
                                <form onsubmit="return false;"   action="{{url('search')}}" id="search_product_form">

                               <div class="input-group index-search-input">
                                  <input type="text" id="text" name="text" class="form-control" placeholder="دسته ، برند یا محصول مورد نظر را جستجو نمائید...">
                                   <span class="input-group-addon" onclick="search_index()">
                                    <i class="fa fa-search"></i></span>
                               </div>
                                </form>

                           </div>

                        </li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-3  ">

              <img  src="{{asset('images/logo.jpg')}}" class=" img-responsive logo">
                </div>
            </div>
        </div>

    </div>
<!-- ==========  megin menu ===========  -->
<div class="container-fluid menu" >
    <div class="container">
        <div class="row">
            <ul class="list-inline " id="product-cat">
               @foreach($category as $key=>$value)
               <li id="product_cat_li_{{$value->id}}">
                <a href="{{url('category').'/'.$value->title_en}}">
                <span>{{$value->title_fa}}</span>
               </a>
                <span id="product_cat_span_{{$value->id}}" class="fa fa-chevron-down"></span>
                <ul class="list-inline sub-menu1">
                    @foreach($value->getchild as $key2=>$value2)
                     <li>
                          <a id="product_cat_link_{{$value2->id}}" href="{{url('/category').'/'.$value->title_en.'/'.$value2->title_en}}">
                             {{$value2->title_fa}}
                         </a>
                         <div class="menu-box">
                            <section class="menu_box2">

                            <?php  $i=0;$j=1; ?>

                             @foreach($value2->getchild as $key3=>$value3)
                                     @php
                                     if($i==0){

                                     @endphp
                                  <div class="menu-box-div-{{$j}}">
                                    @php
                                }
                                      @endphp
                                      <ul>
                                        @php $i++; @endphp
                                          <li>
                                            <a   href="{{url('/category'.'/'.$value->title_en.'/'.$value2->title_en.'/'.$value3->title_en)}}">
                                                {{$value3->title_fa}}
                                            </a>


                                         </li>

                                         @foreach($value3->getchild as $key4=>$value4)
                                         @php

                          if($i==10){

                           $j++;
                           $i=0;
                             @endphp
                             <li >

                            <a  style="color:#16c1f3"   href="{{url('/category'.'/'.$value->title_en.'/'.$value2->title_en.'/'.$value3->title_en)}}">مشاهده موارد بیشتر</a>
                            </li>
                            @php
                            break;
                          }
                         @endphp
                                         <li>
                                           @php $i++; @endphp
  <?php
  $url='/';
  $e=explode('_', $value4->title_en);
   if(sizeof($e)==3){
    if($e[0]=='filter'){
      $url.='search'.'/'.$value->title_en.'/'.$value2->title_en
        .'/'.$value3->title_en.'/'.'?'.$e[1].'[0]='.$e[2];

    }else{
      $url.='category'.'/'.$value->title_en.'/'.$value2->title_en
         .'/'.$value3->title_en.'/'.$value4->title_en;
    }
   }else{
      $url.='category'.'/'.$value->title_en.'/'.$value2->title_en
         .'/'.$value3->title_en.'/'.$value4->title_en;
   }
  ?>
<a href="{{url($url)}}">
<span>
  {{$value4->title_fa}}
</span>
</a>
                                         </li>
                                         @endforeach
                                      </ul>

                                            @php
                                     if($i==0){
                                     @endphp

                                  </div>
                                    @php
                                }
                                @endphp
                             @endforeach

                            @if(!empty($value2->image))
        <div class="cat_img"
        style="background:url({{url('upload/category_image/'.$value2->image)}})  no-repeat scroll 0 0;background-size: 130px 200px;">


         </div>

                               @endif
                         </section>
                         </div>



                     </li>
                    @endforeach
                </ul>
               </li>

                @endforeach
            </ul>
        </div>
    </div>
</div>

 <div class="main container-fluid">
  <div class="container">
   @yield('content')

  </div>
 </div>



<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap-select.js')}}"></script>
<script type="text/javascript" src="{{asset('js/defaults-fa_IR.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/dropzone.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jscolor.js')}}"></script>
<script type="text/javascript" src="{{asset('js/less.min.js')}}"></script>

    @yield('footer')
<script type="text/javascript" src="{{asset('js/site.js')}}"></script>
<script type="text/javascript">
  var search_index = function(){
  var text = $("#text").val();
  var form = $("#search_product_form");
 
  if(text.trim()!=null && text.length > 2){
    form.prop('onsubmit','return true;');
    form.submit();
  }
}
</script>
</body>
</html>
     
    

   





