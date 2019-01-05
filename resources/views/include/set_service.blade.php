
                @if(sizeof($colors)>0)
                <div class="show_product_color">
                <p>انتخاب رنگ</p>
                @foreach($colors as $key=>$value)
                <?php if($key==0) $color_id = $value->id; ?>
                <div class="color_box" @if($key==0) style="border-color:gray;" @endif>
                <label style="background:#{{$value->code}}" > </label>
                <span >{{$value->title}}</span>
                </div>
                @endforeach
                </div>
                @endif
                 <input type="hidden" name="color_id" value="{{ $color_id }}">

            
 








         {{--=============================  --}}

                @if(sizeof($service)>0)
                <div class="product_service_box">
                <p class="title">انتخاب گارانتی</p>



                @foreach($service as $key=>$value)
                @if($check)
                @if($value->id==$check->parent_id)
                <div class="service_box_title" onclick="show_service()">
                {{$value->service_name}}
                <span id="service_title_icon" class="icon"></span>
                </div>
               
                <?php $service_id= $value->id; break; ?>
                @endif

                @else

               @if($color_id ==0)
                <div class="service_box_title" onclick="show_service()">
                <span>{{$value->service_name}}</span>
                <span id="service_title_icon" class="icon"></span>
                </div>
            
                <?php $service_id= $value->id; break; ?>

                @else

                <?php $check = DB::table('service')->where(['parent_id'=>$value->id,'color_id'=>$color_id])->first(); ?>
               @if($check)

                  <div class="service_box_title" onclick="show_service()">
                <span>{{$value->service_name}}</span>
                <span id="service_title_icon" class="icon"></span>
                </div>
             
                 <?php $service_id= $value->id; break;?>
               @endif
                 @endif
                 @endif

                @endforeach
                @endif
                   <input type="hidden" name="service_id" id="service_id" value="{{$service_id}}">

                <div class="service_box_body" id="service_box_body">
                @foreach($service as $key=>$value)
                <div  class="service-item" onclick="set_service({{$value->id}})">
                {{$value->service_name}}
                </div>
                @endforeach
                </div>

                </div>

                 <?php $price = $check ? $check->price : $product->price  ?>
                <div class="product_price_box">
                  <p><span class="title">قیمت :</span> <span class="number">{{number_format($price)}}</span><span>تومان</span></p>
                  @if(!empty($product->discounts))
                  <p><span class="title">قیمت برای شما :</span> <span class="number">{{number_format($price-$product->discounts)}}</span><span>تومان</span></p>
                  @endif
              </div>



