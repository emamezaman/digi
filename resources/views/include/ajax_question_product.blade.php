<div id="ajax_product_questions">
@if(sizeof($questions) > 0)


<div class="li_list">
    <ul>
        <li><span>پرسش ها و پاسخ ها</span><span class="count_question">( {{ sizeof($questions) }} پرسش )</span></li>
        <li><span>مرتب سازی بر اساس</span></li>
        <li>
            <a href=""><span>جدیدترین پرسش</span></a>
        </li>
        <li><a href=""><span>بیشترین پاسخ به پرسش</span></a></li>
        <li>
            <a href=""><span>
               پرسش های شما</span>
            </a>
        </li>
    </ul>
</div> <div class="clearfix"></div>

<div id="list_question">
   <?php   $jdf = new \App\lib\JDF(); ?>
    @foreach($questions as $key=>$value)
    <?php $answers = $value->get_answers; ?>
    {{-- start modal add answer --}}
       <div class="modal fade" id="add_answer_{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-size: 18px;" class="modal-title" id="exampleModalLabel"> پاسخ 
                         
                      
                          
                       
                        
                        </h5>
                        <button style="    margin-top: -21px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                       </button>
                    </div>

                    <div class="modal-body"   >
                        <p class="text-justify" style="font-family: 12px;">
                            پرسش : {{ $value->question }}
                        </p>
                
                    <form method="post" 
                    action="{{url('site/add_question')}}"  
                    id="add_answer_form_{{ $value->id }}">
                         <div class="form-group">
                             <textarea rows="5" style="resize: none;" class="form-control" name="question">
                                 
                             </textarea>
                             <p class="red" id="error_question_{{ $value->id }}">
                                 
                             </p>
                         </div>
                         {{ csrf_field() }}
                         <input type="hidden" name="is_answer" value="is_answer">
                         <input type="hidden" name="parent_id" value="{{ $value->id }}">
                         <input type="hidden" name="product_id" value="{{ $product->id }}">
                         <div>
                             <input class="btn btn-primary" type="submit" value="ثبت پاسخ" name="">
                         </div> 
                      </form>
                     
                    </div>


                </div>
            </div>
        </div>
    {{-- end modal add answer --}}
    <ul>
        <li class="row">
            <div class="col-md-3  icon" >
                <span class="fa fa-question"></span>
                <p>پرسش  </p>
                <div> {{$value->get_user->name }}</div>
            </div>
            <div class="col-md-9">
                <div class="right" >
                 <p >
                        {!! nl2br($value->question) !!}
                 </p>
                    <div class="footer">
                     
                        <em class="date">  {{ $jdf->jdate('d F y',$value->time) }}</em>
                     
                <span id="add_answer_link_{{ $value->id }}" 
                    onclick="add_answer({{ $value->id }})"  class="answer" >
            به این پرسش پاسخ دهید ({{ sizeof($answers) }} پاسخ)
                </span>
                         

                    </div>
                </div>
            </div>

        </li>
        @foreach($answers as $key2=>$value2)
        <li class="row">
            <div class="col-md-3  icon" >
                <span class="fa fa-check" style="color: yellow;"></span>
                <p>پاسخ   </p>
                <div> {{$value2->get_user->name }} </div>
            </div>
            <div class="col-md-9">
                <div class="right">
                  <p>
                        {!! nl2br($value2->question) !!}
                  </p>
                    <div class="footer">

                        <div class="date">{{ $jdf->jdate('d F y',$value2->time) }}    </div>
                        <div class="answer">
                            <span>آیا این نظر برایتان مفید بود؟   </span>
                        </div>

                    </div>
                </div>
            </div>

        </li>
        @endforeach
    </ul>
   @endforeach
</div>
@else

<p class="alert alert-info" style="cursor: pointer;" title="برای  حذف کلیک کنید" onclick="$(this).fadeOut()">
    هیچ داده ای برای نمایش موجود نیست.
</p>
@endif
<div class="text-center" id="paginate_question">
    {{ $questions->links() }}
</div>
</div>

 <script type="text/javascript">
    $("#paginate_question .pagination a").click(function(e){
        $("#loading_questions").show();
        e.preventDefault();
         var url = this.href;
          $.ajax({
        url:url,
        type:'POST',
        data:{product_id:{{ $product->id }},tab_id:'questions',_token:'{{ csrf_token() }}' },
        success:function(data){
            $("#loading_questions").hide();
   
        $("#question_s").html(data);
     
        }
      });

    });
    </script>