@extends('layouts.admin')

@section('title','افزودن نقد و بررسی تخصصی')
@section('header')
<link rel="stylesheet" type="text/css" href="{{asset('css/dropzone.min.css')}}">
@endsection


@section('content')
<div class="panel panel-success">
	
  <div class="panel-heading">
  	نقد و برسی تخصص - {{$product->title}}
  </div>
   <div class="panel-body">
    {!!Form::open(array('url'=>'admin/product/add-review?product_id='.$product->id))!!}
        <input type="hidden" name="type" value="review">
        <div class="form-group ">
          <?php   
            $tozihat = ( $review ? $review->review_tozihat : null);
          ?>
            <div class="col-md-12 ">
                {!!Form::textArea('review_tozihat',$tozihat,['class'=>'form-control ckeditor','style'=>'resize:none;','rows'=>'15'])!!} @if($errors->has('review_tozihat'))
                <span style="color: red" class="help-block">{{$errors->first('review_tozihat')}}</span> @endif
            </div>
        </div>

        <div class="text-center">
          <p>Start_review</p>
          <p>Start_item</p>
          <p>End_item</p>
        </div>

   <div class="form-group col-md-12">
   	<input type="submit" value="ذخیره کن" class="btn btn-primary" name="">
   </div>

    {!!Form::close()!!}

  <div class="panel panel-success">
    <div class="panel-heading">
      افزودن تصاویر برای نقد و برسی
    </div>
    <div class="panel-body">
      
    <div class="form-group col-md-12">{!!Form::open(['route'=>['product_gallery.upload',$product->id],
     'class'=>'dropzone','id'=>'UploadForm'])!!}
         <input type="hidden" name="type" value="review">
    {!!Form::close()!!}
    </div>

    </div>
  </div>

    <div class="row">
  @if(sizeof($images)>0)
  <div id="main_img" class="text-center" >
    <img style="width: 80%;height:300px;border:2px solid gray;padding: 5px;border-radius: 5px;"  title="برای حذف کلیک نمائید" data-toggle="tooltip" data-placement="top" 
    onclick="del_img('File' ,'{{$images[0]->id}}' ,'{{url('admin/product/del_img')}}' , '{{Session::token()}}')" 
    src="{{asset('upload/product_image/'.$images[0]->url)}}">

  </div>
  @endif
</div>
 @if(sizeof($images)>0)
  <p  style="margin-top: 10px;" class="text-center">
    <input style="color:black;" type="text" id="show_url" class="form-control text-center" value="{{asset('upload/product_image/'.$images[0]->url)}}">
    </p>
    @endif
<div class="row">
  @foreach($images as $image)

  <div style="margin: 15px 0;" 

  class="col-md-2 col-sm-2 col-xs-3" style="vertical-align: middle;">
    <img style="border:2px solid gray;height: 130px;padding: 5px;border-radius: 5px;" onclick="change_img('{{asset('upload/product_image/'.$image->url)}}','{{$image->id}}','{{Session::token()}}')" src="{{asset('upload/product_image/'.$image->url)}}"  style="cursor: pointer;"   class="img-responsive">
  </div>
  @endforeach
<br>
    @if(count($images)==0)
      <span style="display:block;text-align: center;"> تصویری برای نمایش موجود نیست</span>
    @endif
   

</div>
   </div>
    
</div>

@stop




@section('footer')
<script type="text/javascript" src="{{asset('js/dropzone.min.js')}}"></script>
{{-- script ckeditor --}}
<script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
 change_img = function(url,id,token){
    var url2 = '{{url('admin/product/del_img')}}';
 var img = '<img   onclick="del_img(\'File\', '+id+',\''+url2+'\',\''+token+'\')"  style="width: 80%;height: 300px;border:2px solid gray;padding: 5px;border-radius: 5px;" src="'+ url +'">';
 $("#show_url").val(url);
 $("#main_img").html(img);
}
</script>
@stop