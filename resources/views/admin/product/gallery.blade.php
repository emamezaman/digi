
@extends('layouts.admin')
@section('title','گالری تصاویر')


@section('header')
<link rel="stylesheet" type="text/css" href="{{asset('css/dropzone.min.css')}}">
@endsection



@section('content')
<div class="row">
  <div class="col-md-12">
     <div class="panel panel-primary">

  <div id="top_gallery" class="panel-heading"> گالری تصاویر : <span style="color:brown">
    {{$product->title}}
  </span>
  </div>



  <div class="panel-body">
  {!!Form::open(['route'=>['product_gallery.upload',$product->id],'class'=>'dropzone','id'=>'UploadForm'])!!}


   {!!Form::close()!!}


 </div>

  </div>
  </div>
</div>
<br>
<div class="row" >
  @if(sizeof($product_images)>0)
  <div id="main_img" class="text-center" >
    <img id="main_img_1" style="width: 35%;"  title="برای حذف کلیک نمائید" data-toggle="tooltip" data-placement="top"
    onclick="del_img('ProductImage','{{$product_images[0]->id}}' ,'{{url('admin/product/del_img')}}' , '{{Session::token()}}')"
    src="{{asset('upload/product_image/'.$product_images[0]->url)}}">
  </div>
  @endif
</div>
<br>
<div class="row">
  @foreach($product_images as $image)

  <div style="margin: 15px 0;" class="col-md-3 col-sm-3 col-xs-6">
    <img onclick="change_img('{{asset('upload/product_image/'.$image->url)}}','{{$image->id}}','{{Session::token()}}')" src="{{asset('upload/product_image/'.$image->url)}}"  style="cursor: pointer;"   class="img-responsive">
  </div>
  @endforeach
<br>
    @if(count($product_images)==0)
      <span style="display:block;text-align: center;"> تصویری برای نمایش موجود نیست</span>
    @endif


</div>
@endsection

@section('footer')
<script type="text/javascript" src="{{asset('js/dropzone.min.js')}}"></script>

<script type="text/javascript">



</script>
@endsection



