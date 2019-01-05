<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		body{
			text-align: right;direction: rtl;
			font-family: tahoma;padding: 30px;
		}
		input[type=text]{
			border-radius: 6px;display: block;padding: 3px 8px;
			height: 38px;
			border: 1px solid blue;
		}
		.right{
			float: right;

		}
		.cls{clear: both;}
	</style>
	<title></title>
</head>
<body>

  <form method="post" action="captcha1">
  	{{csrf_field()}}
  	{{method_field('post')}}
 <p>نام <br> <input type="text" name="name"></p>
 @if($errors->has('name'))
 <span>{{$errors->first('name')}}</span>
 @endif
 <p>فامیلی <br> <input type="text" name="family"></p>
 @if($errors->has('family'))
 <span>{{$errors->first('family')}}</span>
 @endif

        <p>
        <div class="right"  ><input class="right" type="text" name="captcha"></div>
        <div class="right  " style="margin: 3px 5px 0  0">{!!captcha_img()!!}</div>
        </p>
        <div class="cls">   </div>
        @if($errors->has('captcha'))
           <span>{{$errors->first('captcha')}}</span>
          @endif
        <p><button type="submit" name="check">Check</button></p>
      </form>

</body>
</html>
