@extends('layouts.site')

@section('title','مشاهده کامل محصول')

@section('header')

@endsection

@section('content')

<div class="product" style="position: relative;">
     <!--  -->
 <div class="modal fade" id="box_more_image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> {{$product->title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <?php

                  $images = $product->get_images;

                 ?>
      <div class="modal-body">
            <div class="row">
            	  <div class="col-md-8 single_image">
            	  	    @if( sizeof( $images ) > 0 )

                  <img id="single_image"   src="{{url('upload/product_image'.'/'.$images[0]->url)}}"   >

                   @endif
            	  </div>
            	  <div class="col-md-4 ">
            	  	 <div class="list_image">
            	  	 	
            	  	 	 @foreach($images as $image)
                      <img     src="{{url('upload/product_image'.'/'.$image->url)}}" onclick="change_image2('{{url('upload/product_image'.'/'.$image->url)}}')"   >
            	  	  @endforeach
            	  	 </div>
            	  	 
            	  </div>
            </div>
      </div>
      
     
  </div>
</div> 
</div>
<!--  -->

    <div class="row content_box">

        <div class="col-md-5 col-sm-5 ">

          <div class="product_special">
                <div class="special_img">

                </div>
                <div class="pull-left">
                  <ul class="list-inline">
                    <li > <span class="icon icon-statistics"> </span>  </li>
                    <li > <span class="icon icon-current-product-3d"> </span>  </li>
                    <li > <span class="icon icon-love"> </span>  </li>
                     
                  </ul>
                </div>
 
          </div>
          <div class="clearfix"></div>

              

                <div id="show_product_img" class="show_product_img">

                  @if( sizeof( $images ) > 0 )

                  <img id="zoom_01" src="{{url('upload/product_image'.'/'.$images[0]

                  ->url)}}" data-zoom-image="{{url('upload/product_image'.'/'.$images

                  [0]->url)}}">

                   @endif

                 </div>

                <div class="img_box">

                    @foreach($images as $key=>$value)

                        @if($key <= 2)

                        <img src="{{ asset('upload/product_image/'.$value->url)}}" 
                         onclick="change_image('{{ asset('upload/product_image/'.$value->url)}}')">

                        @endif

                    @endforeach

                </div>
                @if(sizeof($images)>3)
                  <div class="more_img" onclick="show_more_image()">
                     <div class="icon"></div>
                  </div>
                @endif

        </div>

        <div class="col-md-7 col-sm-7">

            <div id="img_load_zoom"> </div>

            <div class="show_product_title">

                <div class="col-md-9 col-sm-9">

                    <h4> {{$product->title}} </h4>

                    <p> {{$product->code}} </p>

                </div>

                <div class="col-md-3 col-sm-3 pr0">

                    <div class="rating">

                        <div class="gray">

                            <div class="red" style="width:{{ $data['avg_score'] * 20

                              }}%;">

                            </div>

                        </div>

                    </div>

                    <div class="ray">

                        <p>

                            از {{ $data['total'] }} رای

                         </p>

                    </div>

                </div>

                <div class="clearfix"></div>

            </div>

            @if($product->product_status == 1)

            <form action="{{ url('cart') }}" method="post">

                {{ csrf_field() }}

                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <?php

                  $colors = $product->colors;

                  $color_id = 0;

                  $service_id =0;

                  $price = $product->price;

                ?>
                {{-- show all color --}}
                    <div id="show-service">

                        @if(sizeof($colors)>0)

                        <div class="show_product_color">

                            <p>انتخاب رنگ</p>

                            @foreach($colors as $key=>$value)

                            <?php if($key==0) $color_id = $value->id;

                            ?>
                                <div class="color_box" onclick="set_color({{$value->id}})" @if($key==0) style="border-color:gray;" @endif>
                                    <label style="background:#{{$value->code}}"> </label> <span>{{$value->title}}</span>
                                </div>
                            @endforeach

                          </div>

                          <div class="clearfix"></div>

                        @endif

                        <input type="hidden" name="color_id" value="{{ $color_id }}">
                        <!--    garanti product  -->
                        <?php $service = $product->get_service ?>
                            @if(sizeof($service) > 0)
                            <div class="product_service_box">
                                <p class="title">انتخاب گارانتی</p>
                              @foreach($service as $key=>$value)
                                <!--اگر رنگ نداشت-->
                                @if($color_id==0)
                                <!--  اولین گارانتی را نمایش بده-->
                                <div class="service_box_title" onclick="show_service()"> <span>{{$value->service_name}}</span> <span id="service_title_icon" class="icon"></span> </div>
                                <?php $service_id = $value->id; break; ?>
                                    <!--  اگر رنگ داشت دنبال گارانتی ای با کد رنگ مورد نظر بگرد-->@else
                                    <?php $check = DB::table('service')->where(['parent_id'=>$value->id,'color_id'=>$color_id])->first(); ?>
                                        <!--                 اگر پیدا کردی نشان بده-->
                                        @if($check)
                                        <div class="service_box_title" onclick="show_service()"> {{$value->service_name}} <span id="service_title_icon" class="icon"></span> </div>
                                        <?php
                                           $service_id = $value->id;
                                           $price =$check->price;
                                         break;?>
                                        @endif
                                    @endif
                                @endforeach
                                            <div class="service_box_body" id="service_box_body">
                                                @foreach($service as $key=>$value)
                                                    <div onclick="set_service({{$value->id}})" class="service-item"> {{$value->service_name}} </div>
                                                @endforeach
                                            </div>
                            </div>
                            @endif
                            <input type="hidden" value="{{$service_id}}" name="service_id" id="service_id">
                            <div class="product_price_box">
                                <p>
                                    <span class="title">قیمت :</span>
                                    <span class="number">{{number_format($product->price)}}</span>
                                    <span>تومان</span>
                                </p>
                                  @if(!empty($product->discounts))
                                       <p>
                                           <span class="title">قیمت برای شما :</span>
                                           <span class="number">{{number_format($product->price-$product->discounts)}}</span>
                                           <span>تومان</span>
                                       </p>
                                @endif
                            </div>
                    </div>

                    <div class="btn-cart">
                        <button type="submit" name="" class="btn btn-success">
                            <span class="fa fa-plus"></span> <i class="fa fa-shopping-cart"></i>
                            <span class="text">افزودن به سبد خرید</span>
                        </button>
                    </div>
            </form>

            @else

            <div>
              <br>
              <p class="alert alert-danger">متاسفانه این کالا اکنون در انبار دیجی کالا  موجود نمی باشد</p>
              <p><a class="btn btn-default" href="">موجود شد به من اطلاع بده</a></p>
            </div>
            @endif

        </div>
    </div>
    <!--    html code tabs -->
    @include('include.product-tab',['review'=>$review,'items'=>$items,'product'=>$product,'data'=>$data])
    <!--  end code tab  -->
 
</div>
</div>

</div>


@endsection

@section('footer')
<script type="text/javascript" src="{{asset('js/jquery.elevatezoom.js')}}">
</script>




<script type="text/javascript">
  {{-- start script set _service --}}
       @if($product->product_status == 1)
    function set_service(service_id) {
        $("#service_box_body").slideUp('slow');

        $.ajax({
            url: '{{url('service/set_service ')}}'
            , type: 'POST'
            , data: {service_id: service_id,product_id: {{$product->id}}, color_id: {{$color_id}}
                , _token: '{{csrf_token()}}'}
            , success: function (r) {
                $("#show-service").html(r);

            }
       });
    }
    @endif
 {{-- end script set _service --}}

</script>

  <script type="text/javascript">

         // script tab bax
 $('#myTabs a').click(function (e) {
     var id = this.id.replace('link_','');
     var c = document.getElementById('ajax_product_'+ id );

      if(!c){
          e.preventDefault();
          $("#loading_"+id).show();
      $(this).tab('show');

      if(id=='comments' || id=='questions' ){
              alert(id);
          $.ajax({
            url:'{{ url('site/ajax_get_tab_data') }}',
            type:'POST',
            data:{product_id:{{ $product->id }},tab_id:id,_token:'{{ csrf_token() }}' },
            success:function(data){
            $("#loading_"+id).hide();
            if(id=="comments"){
                 $("#comment_s").html(data);
             }else if(id=="questions"){
             $("#question_s").html(data);
            }
            }
          });
         }

      }

});
    </script>

<script>
    $("#question_form").submit(function(event){
         $("#error_question").html('');
        $("#loading_questions").show();
        event.preventDefault();
        $.ajax({
            url:this.action,
            type:'POST',
            data:$(this).serialize(),
            success:function(data){
                $("#loading_questions").hide();
                if(data=='ok'){
                   $("#success").html('سوال شما با موفقیت ثبت شد بعد از تائید مدیر سایت در سایت قابل دیدن است.')
                    $("#success").fadeIn();
                }else if(data=='error'){
                }else{

                      $.each(data,function(key,value){
                        $("#error_question").html(value);
                      });
                }
            }
        });
    });

   function add_answer(id){

   $("#add_answer_"+ id).modal('show');

      $("#add_answer_form_"+id).submit(function(event){
         $("#error_question_"+id).html('');
        event.preventDefault();

        $.ajax({
            url:this.action,
            type:'POST',
            data:$(this).serialize(),
            success:function(data){

                if(data=='ok'){
                   $("#success").html('پاسخ شما با موفقیت ثبت شد  بعد از تائید مدیر  در سایت قابل دیدن است.');
                    $("#success").fadeIn();
                    $("#add_answer_"+ id).modal('hide');
                    window.location='#top_title';
                }else if(data=='error'){
                }else{

                      $.each(data,function(key,value){
                        $("#error_question_"+id).html(value);
                      });
                }
            }
        });
    });
   }
</script>



@endsection
