        @foreach ($products as $product)
        <div class="list_product">
                <div class="image">
                        <img   src="{{ asset('upload/product_image').'/'.$product->get_image->url }}">
                </div>
                <div   class="product">
                        <p class="product_title">
                                <a href="{{ asset('product').'/'.$product->code_url.'/'.$product->title_url }}">
                                        {{ $product->title }}
                                </a>
                        </p>
                          <?php  $score = get_score($product->get_scores);
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
                     <span class="number" title="{{$product->price}} تومان">{{number_format($product->price)}}</span>
                     <span>تومان</span>
                   </p>

                   <p class="colors">
                     @foreach ($product->colors as $key2=>$value2)

                   <label style="background-color:#{{ $value2->code }};
                    @if($value2->code=="FFFFFF") border:1px solid lightgray;  @endif" title="{{$value2->title}}" >
                   </label>


                    @endforeach
                   </p>
                </div>
                <div class="clearfix"></div>
        </div>
                @endforeach
                <?php
 function  get_score($data){
  $a = sizeof($data);
  $s =0;
  if($a > 0 ){
    foreach ($data as $key => $value) {
      $array = explode('@#$', $value);
      if(sizeof($array) > 0){

      foreach ($array as $key2 => $value2) {

        $c = explode('_', $value2);
        if(sizeof($c) == 2){
          $s = $s + $c[1];
        }
      }

      }
    }
  }
  if($s>0){
    $s = $s/($a*5);
  }
  $result['score'] = $s;
  $result['count'] = $a;
  return $result;
 }
?>


