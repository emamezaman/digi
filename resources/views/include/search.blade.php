
             @if(sizeof($products)>0)
           <div class="product_box box">

        


<?php
function get_score($data) {
	$a = sizeof($data);
	$s = 0;
	if ($a > 0) {
		foreach ($data as $key => $value) {
			$array = explode('@#$', $value);
			if (sizeof($array) > 0) {

				foreach ($array as $key2 => $value2) {

					$c = explode('_', $value2);
					if (sizeof($c) == 2) {
						$s = $s + $c[1];
					}
				}

			}
		}
	}
	if ($s > 0) {
		$s = $s / ($a * 5);
	}
	$result['score'] = $s;
	$result['count'] = $a;
	return $result;
}
?>




 @foreach ($products as $key=>$value)

  <div class="product_item product_item_search">

      <div class="img_div"  >



        <img class="" src="{{ asset('upload/product_image').'/'.$value->get_image->url }}">



      </div>


      <div class="text-center" style="height: 40px; ">

        <div class="product_item_compare"

        onclick="add_compare_product('{{ $value->title }}',{{ $value->id }},'{{ $value->get_image->url  }}')">

          <span id="checkbox_compare_{{ $value->id }}" class="ok_checkbox"

            >

          </span>

          <span>مقایسه  </span>

        </div>
 

        @foreach ($value->colors as $key2=>$value2)

         <label style="background-color:#{{ $value2->code }};
          @if($value2->code=="FFFFFF") border:1px solid lightgray;  @endif" class="color_circle">
         </label>


        @endforeach

        <div class="clearfix"></div>

      </div>
            <p class="title">
                <a href="{{ url('product').'/'.$value->code_url.'/'.$value->title_url }}">
                    @if(strlen( $value->title)>30)
                       {{  mb_substr($value->title , 0,28) }}...
                       @else
                       {{ $value->title }}
                    @endif
                </a>
            </p>
            <?php $score = get_score($value->get_scores);
?>



            <p class="product_score">
              <label class="icon">
              <span>{{ $score['score'] }}</span>
                <span class="fa fa-star"></span>

              </label>
               <label class="number">
                 <span>از</span>
                <span>{{ $score['count'] }} </span>
                 <span>رای </span>
               </label>
            </p>


            <p class="price">
                @if(!empty($value->price))
                <span class="number">{{ number_format($value->price) }}</span>
                <span class="unit">تومان</span>
                @else
                <span class="no_product"> </span>
                @endif
            </p>





  </div>

 @endforeach
 <div class="clearfix">

 </div>
        <div id="paginate_box">

             {{ $products->links() }}

        </div>

 </div>

    @endif



  @if(sizeof($products)==0)

   <div class="alert alert-info"  >
     <p class="text-center" style="padding: 20px;">محصولی برای نمایش یافت نشد</p>
         </div>
  @endif

  <?php
$url = url('ajax/search_filter_product');
?>

 <script>
        $(".pagination a").click(function(event){
            $("#loading").show();
            event.preventDefault();
            var url = $(this).attr('href');

            url = url.split('page=');
            var page= url[1];
            if(url.length==2){
                var ajax_url = '{{$url}}?page='+page;

                send_ajax(ajax_url);
            }
        });



 </script>

   <script type="text/javascript">

  $(".product_item_search").hover(function(){

      $(".product_item_compare",this).css('visibility','visible');

    }
    ,
    function(){

    $(".product_item_compare",this).css('visibility','hidden');

 });



   </script>
