<div id="ajax_product_comments">
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

	@foreach ($scores as $key=>$score)
 <div class="row box" id="div_show_comment_score_product">
	<div class="header_comment"  >
		<span>{{$score->get_user->name }}</span><br>
		<?php 
      $jdf = new App\lib\JDF;
		?>
		<span>
 
			<?= $jdf->tr_num($jdf->jdate('d F Y',$score->time))  ?>
			
		</span>
	</div>
	<?php 
		 
		 $score_list = App\Score::get_list_score($score);
		 
$item_score = ['کیفیت ساخت ','ارزش خرید به نسبت قیمت ','امکانات و قابلیت ها ','سهولت استفاده ','طراحی و ظاهر ','نوآوری'];
	 ?>
	 
	<div class="col-md-7 col-sm-7 col-lg-7">
		<div id="show_score_box">
			<div class="show_score_box">
				@foreach ($score_list as $key2=>$value2)
             
				 <div class="score">
					<div class="title_score">{{ $item_score[$key2-1] }}</div>

					 @for ($i=1; $i<=5;$i++)
					<div class="div_score @if($i<=$value2)bgc-gray @endif"></div>
					@endfor 
				</div>
				@endforeach
				
			</div> 
		</div>
	</div>
<?php $comment = $score->get_comment; ?>
	<div class="col-md-5 col-sm-5col-lg-5">
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
					<div class="desadvantages_title">نقاط  ضعف</div>
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
	
@endforeach
<center>
	{{ $scores->links() }}
</center>
</div>


    <script type="text/javascript">
    $(".pagination a").click(function(e){
    	//$("#loading").show();
        e.preventDefault();
         var url = this.href;
          $.ajax({
        url:url,
        type:'POST',
        data:{product_id:{{ $product->id }},tab_id:'comments',_token:'{{ csrf_token() }}' },
        success:function(data){
            //$("#loading").hide();
   
        $("#tab_3").html(data);
     
        }
      });

    });
    </script>
      

	

 
   

  	
       
      
        
	 
       
	
