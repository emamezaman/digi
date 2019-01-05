@extends('layouts.site')

@section('title','مقایسه محصولات ')

@section('content')

<div id="compare" class="row box">
  <div class="compare_items_box">
  	<div id="product_compare_list">
  		@for($i=0; $i<4;$i++)
      @if(array_key_exists($i, $products))
  		<div class="product_compare">
  			<p class="img">
  				<img src="{{ asset('upload/product_image').'/'.$products[$i]->get_image->url }}">
  			</p>
  			<p class="title">
  				<a href="{{ url('upload/product_image').'/'.$products[$i]->code_url.'/'.$products[$i]->title_url }}">
            {{ mb_substr($products[$i]->title,0,30) }}
          </a>
  			</p>
        <p class="code_title">
          <a href="{{ url('upload/product_image').'/'.$products[$i]->code_url.'/'.$products[$i]->title_url }}">
              {{ substr($products[$i]->code,0,30) }}
          </a>
        </p>
  		</div>

      @else

      <div class="product_compare compare_select_box" >
       
        <div style="margin:auto;width: 85%;" >
           <p style=" margin-top: 20px;">
          افزودن
        </p>
          <div class="chosen_cat_product" id="chosen_cat_product_{{ $i }}" onclick="show_cat_box({{ $i }})">
            <p>
              <span id="compare_product_title_{{  $i }}">انتخاب دسته</span>
              <span class="fa fa-angle-down"></span>
            </p>
          </div><div class="clearfix"></div>
          <div class="compare_cat_box_div" id="compare_cat_box_div_{{ $i }}">
            <div class="cat_search_box">
              <input type="text" class="search"  >
            </div>
            <div style="  max-height: 150px;overflow-y: auto;">
              <ul class="cat_list_ul list">
              @foreach($cat_list as $key=>$value)
               <li onclick="get_product_cat({{ $key }},{{ $i }},'{{ $value }}')">
               <span class="cat_name">  {{ $value  }}</span>
               </li>
              @endforeach
            </ul>
            </div>
          </div>

          <div class="chosen_product" id="chosen_product_{{ $i }}" onclick="show_product_box({{ $i }})">
            <p>
              <span id="compare_product_title2_{{  $i }}">انتخاب مدل </span>
              <span class="fa fa-angle-down"></span>
            </p>
          </div>
          <div class="clearfix"></div>

          <div class="compare_product_box" id="compare_product_box_{{ $i }}">
            
          </div>


        </div>
        
      </div>

      @endif

  		@endfor
  		 
  	</div>

  	<div class="clearfix"></div>
  <div id="dd" {{-- style="width:{{ sizeof($products) * 25 }}%;" --}} ">
  	
  	
@foreach ($items as $item)
	<div class="items_box" >
		<span class="fa fa-caret-left"></span>
		<span>{{ $item->name }}</span>
		<span id="icon_angle_{{ $item->id }}" class="fa fa-angle-up" onclick="show_hide_item({{ $item->id }})">
			
		</span>
	</div>
 
	<table id="table_item_{{ $item->id }}"  class="item_table table table-bordered table-striped "  style="width:100%">
			@foreach ($item->childs as $child_item)
			<tr>
				<th style="width: 180px;">
					{{ $child_item->name }}
				</th>
				@foreach ($products as $key2=>$value2)
                   @if($value2)
                    <td style="width: 200px">
                    	@if(array_key_exists($value2->id, $product_items))
                           @if(array_key_exists($child_item->id, $product_items[$value2->id]))
                          <?php 
                              $val = $product_items[$value2->id][$child_item->id];
                          ?>
                           @if($val=='1' || $val=='3' )
                           
                           <span class="fa fa-check" style="color:green"></span>
                           @elseif($val=='2')
                             <span class="fa fa-remove" style="color:red"></span>
                            @else

                            {!!  nl2br(str_replace('@#!',' , ',$val)) !!}
                           
                           @endif
                            
                           
                    	   @endif 
                    	@endif
                    </td>
                   @endif
				@endforeach
			</tr>
			@endforeach
	</table>
 
		
@endforeach
</div>
  </div>	
</div>
 
@endsection

@section('footer')

<script src="{{asset('js/list.min.js')}}"></script>

<script type="text/javascript">
	show_hide_item = function(id){
	var c = document.getElementById("table_item_"+id);
	var f = document.getElementById("icon_angle_"+id);
	if(c && f){
		 
          $("#table_item_"+id).slideToggle('fast');
           if(f.className=="fa fa-angle-down"){
            f.className = "fa fa-angle-up";
           }else{
           f.className="fa fa-angle-down";
           }
     
		 
	}
}
</script> 
<script type="text/javascript">
  show_cat_box = function(id){
 
  var c = document.getElementById("compare_cat_box_div_"+id);
  if(c){
    if(c.style.display=="block"){ 
  
      $("#"+c.id).slideUp();
      setTimeout(function(){
        $("#chosen_cat_product_"+id).css('border-bottom-width','1px');
      },400);
  }else{
  $("#chosen_cat_product_"+id).css('border-bottom-width','0px');
   $("#"+c.id).slideDown();
  }
}
$("#compare_product_box_"+id).hide();
}
</script>

<script>
    var options = {
        valueNames: ['cat_name']
    };
    @for($i=0; $i<4; $i++)
      @if(!array_key_exists($i, $products))
    var compare_cat_box_div1_{{ $i }} = new List('compare_cat_box_div_{{$i}}', options);
    @endif
    @endfor 

</script>

<script type="text/javascript">
  hide_cat_box=function(id){
    var c = document.getElementById("compare_cat_box_div_"+id);
    if(c.style.display=="block"){
      $("#compare_cat_box_div_"+id).slideUp();
    }
  
  }
</script>
<script type="text/javascript">
  <?php  $url = url('ajax_get_product_cat');?>
  function get_product_cat(id,index,value){
 
    $("#compare_cat_box_div_"+index).slideUp();
     $("#chosen_cat_product_"+index).css('border-bottom-width','1px');
     $("#compare_product_title_"+index).html(value);
     $("#compare_product_box_"+index).html('');
     $("#chosen_product_"+index).css('background-color','white');
     $("#chosen_product_"+index).css('color','gray');
     $.ajax({
      url:'{{ $url }}',
      type:'POST',
      data:{cat_id:id,_token:'{{ csrf_token() }}' },
      success:function(data){
        product = data;
        var div='';
     for(var i=0;i<product.length;i++){

      var src = '{{ url('upload/product_image').'/' }}'+ product[i].get_image.url;
       div = '<div class="row1">'+
       '<div class="col-md-4 pr0"><img src="' + src + '"></div>'+
       '<div class="col-md-8 pr0 pl0"><p class="title">' + product[i].title + '</p>'+
       '<p class="code">' + product[i].code + '</p></div>'+
       '</div>';
    

      $("#compare_product_box_"+index).append(div);
     }
      //$("#compare_product_box_"+index).slideDown();

      }
     });
  }
</script>
<script type="text/javascript">
  function show_product_box(index){
 
  var c = document.getElementById("compare_product_box_"+index);
  if(c){

    if(c.style.display=="block"){ 
  
      $("#"+c.id).slideUp();
      // setTimeout(function(){
      //   $("#chosen_cat_product_"+id).css('border-bottom-width','1px');
      // },400);
  }else{
  //$("#chosen_cat_product_"+id).css('border-bottom-width','0px');
   $("#"+c.id).slideDown();
  }


  }
    
}
            
</script>

 

   
   
@stop