@extends('layouts.admin') 

@section('title','نمایش و مدیریت پرسش های کاربران')

@section('content')
 
  
		
	
<div class="box_div">

	<div class="my_title">
	    <span>
	        نمایش و مدیریت پرسش های کاربران
	    </span>
    </div>
 
    @if(Session::has('msg'))

    <p class="alert alert-success" style="margin:0 15px;" >

   	       {{ Session::get('msg') }}
   
   </p>
   
   <br>
   
    @endif

 	   @foreach ($questions as $value)
   
   <div class="question_box" @if($value->status==0)  style="border-color: red;" @endif
 	id="box_status_question_{{ $value->id }}">

 	<?php $jdf = new App\lib\JDF(); ?>
 	   
 	   <p style="color: blue">
 	   	توسط  - {{ $value->get_user->name }} - {{ $jdf->jdate('d F y',$value->time) }}
 	   	@if($value->parent_id !=0)
         <span style="margin-right: 5px;">ثبت شده در پاسخ به   </span>
         <?php 
         
         $parent = App\Question::findOrFail($value->parent_id);
         ?>
         <span>
         	@if($parent)
            {{ $parent->get_user->name }}
         	@endif
         </span>
 	   	@endif
 	   </p>
    	
    	<p>
    		{!! strip_tags(nl2br($value->question),'<p><br>') !!} 
    	</p>
    	
    	<p><label style="color: red">ثبت شده برای محصول : </label></p>
    	
    	<p>{{ $value->get_product->title }}</p>
    	
    	<p>
    		<label style="color:blue;cursor: pointer;" 

    		onclick="set_status_question({{ $value->id }},'{{ Session::token() }}')" 

    		id="label_status_question_{{ $value->id }}">

             @if($value->status==1) تائید شده  @else در انتظار تائید   @endif 
    		
    		</label> 
            -
    		<label class="btn btn-success" onclick="show_form_question({{ $value->id }})">

    			ارسال پاسخ  

    		</label>

    		<label>-</label>

    		<label 
    		onclick="del_row('{{ $value->id }}','{{ url('admin/remove_question') }}' 
    			,'{{ Session::token() }}')" class="btn btn-danger">

    			حذف

    		</label>
    	
    	</p>

    	<div class="form_question"  id="form_question_{{ $value->id }}">
    		
    		<form  method="post" action="{{ url('admin/add_answers') }}">
    			
    			{{ csrf_field() }}
    			
    			<input type="hidden" name="product_id" value="{{ $value->get_product->id }}">
    			<input type="hidden" name="parent_id" value="{{ $value->id }}">
    			<div class="form-group">
    				<textarea name="question" class="form-control   question_text" >
    					
    				</textarea>
    				@if($errors->has('question'))
    				<span class="red">
    					{{ $errors->first('question') }}
    				</span>
    				@endif
    			</div>
    			<div class="form-group">

    				<button class="btn btn-success">
    					ثبت پاسخ
    				</button>
    			
    			</div>
    		</form>
    	</div>


 </div>
    @endforeach
   
<p>
	{{ $questions->links() }}
</p>

</div>
@stop