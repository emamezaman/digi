<div class="row  tab_box_product">
    

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" id="myTabs" role="tablist">
            @if(1==3)
<!--               empty($review)-->
                <li role="presentation" class="active">
                    <a href="#review" aria-controls="review" role="tab" data-toggle="tab" id="link_review">
                        <i class="fa fa-book"></i> ن
                        قد و برسی تخصصی دیجی آنلاین
                    </a>
                </li>

            @endif
            @if(sizeof($items)>0)
                <li role="presentation">
                    <a href="#items" aria-controls="items" role="tab" data-toggle="tab" id="link_items">
                        <i class="fa fa-book"></i>
                        مشخصات فنی
                    </a>
                </li>
            @endif
            <li role="presentation">
                <a href="#comments" aria-controls="comments" role="tab" data-toggle="tab" id="link_comments">
                    <i class="fa fa-book"></i>
                    نظرات کاربران</a>
            </li>
            <li role="presentation">
                <a href="#questions" aria-controls="questions" role="tab" data-toggle="tab" id="link_questions">
                    <i class="fa fa-book"></i>
                    پرسش و پاسخ</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
      @if(1==3)
<!--      !empty($review)-->
      <div role="tabpanel" class="tab-pane  active" id="review">
      <h3 class="title_top">
      <i class="fa fa-caret-left"></i>
      نقد و برسی تخصصی
      </h3>

      <h5   class="product_title">
      {{$product->title}}
      </h5>

      <?php

      $review_tozihat = $review->review_tozihat;
      $f = strpos($review_tozihat, 'start_review');
      $t = substr($review_tozihat, 0, $f);
      echo nl2br(strip_tags($t, '<img> <p> <div>'));
      $t2 = substr($review_tozihat, $f, strlen($review_tozihat));
      $text = explode('start_review', $t2);
      foreach ($text as $key => $value) {
      if (!empty($value)) {
      $d = '<div class="review-title" onclick="show_review(' . $key . ')" id="review-title-' . $key . '"><span class="menha" id="review-span-' . $key . '"></span>';
      $v = str_replace('start_item', $d, $value);

      $d2 = '</div><div class="review-div" id="review-div-' . $key . '">';
      $v = str_replace('end_item', $d2, $v);
      echo nl2br(strip_tags($v, '<img> <p> <div><span>')) . '</div>';
      }
      }
      ?>

      <hr>
      </div>
      @endif


            @if(sizeof($items)>0)
           <div role="tabpanel" class="tab-pane " id="items">
            <h2 class="c-params__headline">
                مشخصات فنی
                <span>{{ $product->title }}</span>
            </h2>
            @foreach($items as $item)

                <section>
                    <h5> {{$item->name}}</h5>
                    <ul>
                        @foreach($item->childs as $child)
                            @if(!empty( $child->get_value_item->value))
                            <li>
                                <div>{{$child->name}}</div>
                                <div class="value">
                                    <?php $value = $child->get_value_item->value;
                                    $filed = $child->filed;
                                    ?>
                                        @if($filed =='1' )
                                            @if ($value == 1)
                                        <span class="fa fa-check alert-success"></span>
                                            @elseif($value == 2)
                                        <span class="fa fa-close alert-danger"></span>
                                            @elseif($value == 3)
                                        <span class="fa fa-check alert-success"></span>
                                            @elseif($value == 4)
                                        <span class="fa fa-close alert-danger"></span>
                                            @endif

                                </div>
                            </li>

                        @elseif($filed=='2')
                        <span>{{$value}}</span>
                   </div>
                   </li>

    @else
        <?php $arr = explode('@#!', $value);?> 
        @foreach($arr as $k=> $ar ) 
        @if(!empty($ar)) 
        @if($k==0)
            <span>{{$ar}}</span>

</li>
@else
    <li>

        <div class="value"><span>{{$ar}}</span></div>
    </li>
    @endif
    @endif
    @endforeach
    @endif
    @endif
    @endforeach
    </ul>
    </section>
    @endforeach
    
@endif
 </div>


           <div role="tabpanel" class="tab-pane" id="comments">
                 <div id="loading_comments">
                     <span class="animation"></span>
                      <span>در حال دریافت اطلاعات...</span>
                 </div>
        <div class="row" id="show_sum_score_product">
            <?php
            $item_score = [
                'کیفیت ساخت ',
                'ارزش خرید به نسبت قیمت ',
                'امکانات و قابلیت ها ',
                'سهولت استفاده ',
                'طراحی و ظاهر ',
                'نوآوری'
            ];
            ?>
            <p>امتیاز شما به : <span class="title-product">{{ $product->title }}</span></p>
            <div class="col-md-7">

                <?php

                function width($value, $q)
                {

                    if ($value >= $q) {

                        return 1;

                    } else {
                        $r = $value - intval($value);
                        $n = $q - $value;
                        if ($n < 1) {
                            return $r;
                        } else {
                            return 0;
                        }
                    }
                }

                ?>
                <div class="show_score_box">
                    @foreach ($data['sum_score'] as $key=>$value)

                        <div class="score">
                            <div class="title_score">{{ $item_score[$key-1] }}</div>

                            @for ($i=1; $i<=5;$i++)
                                <div class="div_score2">
                                    <?php $w = width(number_format($value, 1), $i); ?>
                                    <div class="percent" style="width:{{ $w * 100 }}%">
                                    </div>

                                </div>
                            @endfor
                            <div class="number_score">
                                {{ number_format($value,1) }}
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
            <div class="col-md-5 col_left">
                <h5> شما هم میتوانید در مورد این کالا نظر دهید.</h5>
                @if(Auth::check())
                    <a href="{{ url('Addcomment').'/'.'DPK-'.$product->id }}" class="btn btn-primary">نظر دهید </a>
                @else
                    <p class="tozihat">
                        برای ثبت نظرات، نقد و برسی شما ابتدا لازم است وارد حساب کاربری خود شوید.اگر این محصول را قبلا از
                        دیجی کالا خریده باشید نظر شما به عنوان مالک محصول ثبت خواهد شد.
                    </p>
                @endif
                <p class="count_score">
                    <span> {{ $data['avg_score'] }} / 5 </span>
                    <span>{{ $data['total'] }} نفر</span>
                </p>


            </div>
           </div>
           <div id="comment_s">
               
           </div>
</div>


           <div role="tabpanel" class="tab-pane " id="questions">
               <div id="loading_questions">
    
             <span class="animation"></span>
                   <span>در حال دریافت اطلاعات...</span>
               
              </div>
                 <div id="top_title" class="top_title">
                 پرسش و پاسخ
                     <br>
                     <span>پرسش خود را در مورد محصول مطرح نمایید</span>
                 </div>
                 <div onclick="$(this).fadeOut()" style="display: none" class="alert alert-success" id="success">

                 </div>
               <br>
               @if(Auth::check())
                 <form  id="question_form" action="{{url('site/add_question')}}"    method="post" class="question_form">
                    {{csrf_field()}}
                     <input type="hidden" name="product_id" value="{{$product->id}}">
                     <input type="hidden" name="parent_id" value="0">
                    <div class="form-group">
                      <textarea class="form-control text_question " @if(!Auth::check()) disabled @endif name="question">
              
                       </textarea>
                       
                                  <span id="error_question" class="red">

                                  </span>

                    </div>
                    <div class=" div_submit ">
                      <button type="submit" @if(!Auth::check()) class="my_disabled" @endif >
                          ثبت پرسش
                      </button>
                    </div>
                    <div class="div_help">
                      <p>
                          <span class="check">
                
                           </span>
                           <input style="display: none;" type="checkbox" name="send_mail">اولین پاسخی که به پرسش من داده شد، از طریق
                    ایمیل به من اطلاع دهید.
                      </p>
                      <p>
                    با انتخاب دکمه “ثبت پرسش”، موافقت خود را با     <a href="">قوانین انتشار محتوا د</a>ر دیجی کالا اعلام می
                    کنم.     
                     </p>
                    </div>
                 </form>
                @else
                   <p class="alert alert-info">
                       برای ثبت پرسش و پاسخ ابتدا بایستی در سایت لاگین کنید.
                   </p>
               @endif
                 <div class="clearfix"></div>
             
               <div id="question_s">
                   
               </div>

           </div>
 
</div>
</div>


