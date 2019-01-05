@extends('layouts.admin') 

@section('title','نمایش و مدیریت نظرات کاربران  ')

@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		
	
<div class="box_div">

	<div class="my_title">
	    <span>
	       نمایش و مدیریت نظرات کاربران
	    </span>
    </div>

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
		<div class="pull-right">
			<span>{{$score->get_user->name }}</span><br>
		<?php 
      $jdf = new App\lib\JDF;
		?>
		<span>
 
			<?= $jdf->tr_num($jdf->jdate('d F Y',$score->time))  ?>
			
		</span>
		</div>

		<label class="btn btn-danger pull-left" style="margin-right: 5px;
            padding: 4px 10px;
            border-radius: 4px;" title="حذف  امتیاز" 
            onclick="del_row('{{ $score->id }}','{{ url('admin/remove_score') }}','{{ Session::token() }}')">
            حذف امتیاز
		    	
		</label>

		<?php $comment = $score->get_comment_admin; ?>

        @if(!empty($comment))


		<label class="btn btn-danger pull-left" style="margin-left: 5px;
            padding: 4px 10px;
            border-radius: 4px;" title="حذف نظر" 
            onclick="del_row('{{ $comment->id }}','{{ url('admin/remove_comment') }}','{{ Session::token() }}')">
		    حذف نظر	
		</label>


		<label id="status_comment_{{ $comment->id }}" 
			class=" status_comment" title="تغییر وضعیت" 
			
			style="{{ $comment->status==1 ? 'color:green':'color:red' }};margin-left: 7px;"  
		    
		    onclick="set_status_comment('{{ $comment->id }}','{{ Session::token() }}')" >


			@if($comment->status==1)
        
           	  تائید شده
          
            @else
            
             	در انتظار تائید
            
			@endif

		</label>

		

		

		@endif

      <div class="clearfix">
      	
      </div>
	</div>


	<p style="margin-top: 20px;margin-right: 30px;">
		<label>نام محصول - </label> {{ $score->get_product->title }}
	</p>
 
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

	<div class="col-md-5 col-sm-5col-lg-5">
 	<div id="show_comment_box_user">

 		@if(!empty($comment))
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

				@if((!empty($comment->desadvantages) 

				     && $comment->desadvantages !='@#$%'))
				  
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
				@if($comment->comment_text)
				<p>توضیحات : </p>
				<div class="comment_text">
					{{ $comment->comment_text }}
				</div>
				@endif
			</div>
		@endif

		</div>
	</div> 
</div>
	
@endforeach
<center>
	{{ $scores->links() }}
</center>
</div>



</div>
</div>
</div>
@stop

@section('footer')

<script type="text/javascript">

</script>
@stop