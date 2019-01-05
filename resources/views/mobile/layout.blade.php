<!doctype html>
<html lang="en">

<head>
    <title>فروشگاه اینترنتی دیجی آنلاین</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-select.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-rtl.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/dropzone.min.css')}}">
    @yield('header')
    <link rel="stylesheet/less" href="{{asset('css/mobile.less')}}">
   



</head>

<body>
  

<div id="cat_box">
    
    <div class="col-xs-9 pr0 pl0" id="cat_list">
         <div class="header">
             <p>دیجی آنلاین</p>
         </div>
         <div class="cat_list">
             <ul>
                  @foreach($category as $key=>$value)
                 <li >
                <span class="pull-right name_cat" onclick="show_child_cat({{ $value->id }})">
                        {{ $value->title_fa }}
                    </span> 
                     <span id="fa-angle_{{$value->id}}" class="fa fa-angle-down pull-left fa-angle" onclick="show_child_cat({{ $value->id }})">
                        
                     </span>
                     <span class="clearfix"></span>
                      
                     <?php $child1 = $value->getChild; ?>
                     @if(sizeof($child1) > 0)
                     <ul class="cat_child_ul" id="cat_child_ul_{{ $value->id }}">
                          @foreach($child1 as $key2=>$value2)
                         <li>
                          
                              <a href="{{ url('category').'/'.$value->title_en.'/'.$value2->title_en }}">
                                     {{ $value2->title_fa }}
                                  
                              </a>
                               
                             
                         </li>
                         @endforeach
                     </ul>
                     @endif
                 </li>
                 <span class="clearfix"></span>
                 @endforeach
             </ul>
         </div>
    </div>
    
    <div class="col-xs-3 pr0 pl0" id="col_shadow" onclick="hide_cat_box()" > 

    </div>
   
</div>
<div class="clearfix"></div>

 
 <div class="main container-fluid">
    <div id="header">
        <ul id="li_header">
           <li class="pull-right" onclick="show_cat_box()">
            <span  class="fa fa-bars "></span>
          </li>
            <li class="pull-right">
                <a href="" class="text"><span >دیجی آنلاین </span></a>
            </li>
            <li class="pull-left"><span class="fa fa-user "></span></li>
            <li class="pull-left"><span class="fa fa-shopping-cart "></span></li>
            <li class="pull-left"><span class="fa fa-search "></span></li>
        </ul>
    </div>
    
<div style="margin-top: 60px;">
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
<script type="text/javascript" src="{{asset('js/mobile.js')}}"></script>
</body>
</html>








