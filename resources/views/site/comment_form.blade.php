@extends('layouts.site')

@section('title','افزودن  نظرات')
@section('header')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/rangeslider.css') }}">

@stop

@section('content')
    <div id="comment_page">
        <div class="row box">
            <div class="col-md-4">
                <div class="product_image_comment">
                    <img src="{{ asset('upload/product_image/'.$product->get_image->url) }}">
                    <p class="ftitle">
                        <a href="{{ url('product'.'/'.$product->code_url.'/'.$product->title_url) }}"
                           title="{{ $product->title }}">{{ $product->title }}</a>
                    </p>
                    <p class="etitle">
                        <a href="{{ url('product'.'/'.$product->code_url.'/'.$product->title_url) }}"
                           title="{{  $product->code }}">{{ $product->code }}</a>
                    </p>
                </div>
            </div>
            <div class="col-md-8" id="score">
                <br>
                <h4>امتیاز شما به این محصول</h4>
                <br>
                <form method="post" action="{{ url('site/add_score') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <p style="width: 300px;">
                        <label>کیفیت ساخت</label>
                        <input id="range_1" type="range" min="0" name="range[1]" max="5" data-rangeslider step="1"
                               value="{{ array_key_exists(1, $score) ? $score[1] : 0 }}">
                    <div id="output_range_1"></div>
                    </p>

                    <p style="width: 300px;">
                        <label>ارزش خرید به نسبت قیمت</label>
                        <input id="range_2" type="range" min="0" name="range[2]" max="5" data-rangeslider step="1"

                               value="{{ array_key_exists(2, $score) ? $score[2] : 0 }}">
                    <div id="output_range_2"></div>
                    </p>

                    <p style="width: 300px;">
                        <label>نوآوری</label>
                        <input id="range_3" type="range" min="0" name="range[3]" max="5" data-rangeslider step="1"
                               value="{{ array_key_exists(3, $score) ? $score[3] : 0 }}">
                    <div id="output_range_3"></div>
                    </p>

                    <p style="width: 300px;">
                        <label>امکانات و قابلیت ها</label>
                        <input id="range_4" type="range" min="0" name="range[4]" max="5" data-rangeslider step="1"
                               value="{{ array_key_exists(4, $score) ? $score[4] : 0 }}">
                    <div id="output_range_4"></div>
                    </p>


                    <p style="width: 300px;">
                        <label> سهولت استفاد</label>
                        <input id="range_5" type="range" min="0" name="range[5]" max="5" data-rangeslider step="1"
                               value="{{ array_key_exists(5, $score) ? $score[5] : 0 }}">
                    <div id="output_range_5"></div>
                    </p>


                    <p style="width: 300px;">
                        <label>طراحی و ظاهر</label>
                        <input id="range_6" type="range" min="0" name="range[6]" max="5" data-rangeslider step="1"
                               value="{{ array_key_exists(6, $score) ? $score[6] : 0 }}">
                    <div id="output_range_6"></div>
                    </p>
                    <p>
                        @if(is_array($score))
                        @if(sizeof($score) == 0 )
                            <button class="btn btn-primary pull-left">ذخیره کن</button>
                        @endif
                        @endif
                    </p>

                </form>
            </div>
            <div class="clearfix"></div>
        </div>

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
        @if(!empty($comment))


            <div class="row box" id="div_show_comment_score_product">
                <div class="header_comment">
                    <span>{{$obj_score->get_user->name }}</span><br>
                    <?php
                    $jdf = new App\lib\JDF;
                    ?>
                    <span>

			<?= $jdf->tr_num($jdf->jdate('d F Y', $obj_score->time))  ?>
			
		</span>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <div id="show_score_box">
                        <div class="show_score_box">
                            @foreach ($score as $key=>$value)

                                <div class="score">
                                    <div class="title_score">{{ $item_score[$key-1] }}</div>

                                    @for ($i=1; $i<=5;$i++)
                                        <div class="div_score @if($value>=$i)bgc-gray @endif"></div>
                                    @endfor
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-lg-6">
                    <div id="show_comment_box_user">
                        <div class="show_comment_box_user">
                            <div class="subject">{{ $comment->subject }}</div>
                            @if(!empty($comment->advantages))
                                <div class="div_advantages">
                                    <div class="advantages_title">نقاط قوت</div>
                                    <?php $d = explode('@#$%', $comment->advantages);  ?>
                                    @foreach($d as $key=>$value)
                                        @if(!empty($value))
                                            <div class="items_advantages">
                                                <span class="icon-arrow-top"></span>
                                                <span class="text_advantages">{{ $value }}</span>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                            @if(!empty($comment->desadvantages))
                                <div class="div_desadvantages">
                                    <div class="desadvantages_title">نقاط ضعف</div>
                                    <?php $d = explode('@#$%', $comment->desadvantages);  ?>
                                    @foreach($d as $key=>$value)
                                        @if(!empty($value))
                                            <div class="items_desadvantages">
                                                <span class="icon-arrow-bottom"></span>
                                                <span class="text_desadvantages">{{ $value }}</span>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                            <div class="comment_text">
                                {{ $comment->comment_text }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else

            <div class="row box " id="comment_box" style="@if(sizeof($score) > 0 )opacity:1;@else opacity:0.4;@endif">
                <p class="title">
                    دیگران را با نوشتن نقد ، برسی و نظرات خود ، برای انتخاب این محصول راهنمایی کنید.
                </p>
                <form action="{{ url('site/add_comment') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="score_id" value="{{ $obj_score ? $obj_score->id : ''}}">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label_comment">عنوان نقد و برسی شما (اجباری)</label>
                            <input type="text" class="form-control" name="subject">
                            @if($errors->has('subject'))
                                <span class="red">
					{{ $errors->first('subject') }}
				</span>
                            @endif
                        </div>
                        <div id="div_advantages">

                            <div class="form-group div_advantages" id="div_advantages_0">
                                <p><label class="label_comment green">نقاط قوت</label></p>

                                <input type="text" name="advantages[]" class="form-control input_advantages">
                                <div class="icon-form-add" onclick="add_advantages()">+</div>
                                <div class="icon-form-remove">-</div>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-6">
                        <div id="desadvantages">
                            <div class="form-group desadvantages"
                                 @if($errors->has('subject')) style="padding-top:101px;"
                                 @endif  id="div_desadvantages_0">
                                <p>
                                    <label class="label_comment gray">نقاط ضعف</label>
                                </p>
                                <input type="text" class="form-control input_desadvantages" name="desadvantages[]">
                                <div class="icon-form-add" onclick="add_desadvantages()">+</div>
                                <div class="icon-form-remove">-</div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12" id="comment_text">
                        <div class="form-group">
                            <label class="label_comment"> متن نقد و برسی شما (اجباری)</label>
                            <textarea name="comment_text" class="form-control comment_text">
					
				</textarea>
                        </div>
                        <div class="form-group">
                            @if(empty($comment))
                                <button class="btn btn-primary pull-left">
                                    ثبت نقد و بررسی
                                </button>
                            @endif
                        </div>
                    </div>

                </form>
            </div>
        @endif


    </div>
@stop


@section('footer')
    <script type="text/javascript" src="{{ asset('js/rangeslider.js') }}"></script>

    <script type="text/javascript">
        var textContent = ('textContent' in document) ? 'textContent' : 'innerText';

        function valueOutput(element) {

            var value = element.value;
            $("#output_" + element.id).html(element.value);
            $("#" + element.id).value = element.value;
        };

        $('[data-rangeslider]').rangeslider({
            polyfill: false,
            onInit: function () {
                valueOutput(this.$element[0]);

            },
            onSlideEnd: function (position, value) {
                valueOutput(this.$element[0]);
            }
        });


    </script>
    <script type="text/javascript">
        function add_advantages() {
            var count = document.getElementsByClassName('div_advantages').length;
            var html = '<div class="form-group div_advantages" id="div_advantages_' + count + '">' +
                '<input type="text" name="advantages[]" class="form-control input_advantages">' +
                '<div class="icon-form-add" onclick="add_advantages()">+</div>' +
                '<div class="icon-form-remove" onclick="remove_advantages(' + count + ')">-</div></div>';
            $("#div_advantages").append(html);
        }

        function remove_advantages(id) {
            $("#div_advantages_" + id).remove();
        }

        function add_desadvantages() {
            var count = document.getElementsByClassName('desadvantages').length;
            var html = '<div class="form-group desadvantages"  id="div_desadvantages_' + count + '">' +
                '<input type="text" class="form-control input_desadvantages" name="desadvantages[]">' +
                '<div class="icon-form-add" onclick="add_desadvantages()">+</div>' +
                '<div class="icon-form-remove" onclick="remove_desadvantages(' + count + ')">-</div>' +
                '</div>';
            $("#desadvantages").append(html);
        }

        function remove_desadvantages(id) {
            $("#div_desadvantages_" + id).remove();
        }


    </script>

@stop