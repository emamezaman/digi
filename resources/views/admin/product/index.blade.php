
@extends('layouts.admin')
@section('title','نمایش و مدریت محصولات')
@section('content')


@if(session()->has('success'))
<div class="alert alert-success alert-dismissable">
    <button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
           {{session('success')}}
</div>
@endif



 <div class="panel panel-primary">

  <div class="panel-heading  text-center"> نمایش و مدریت محصولات
     <a title="اضافه نمودن محصول جدید" href="{{route('product.create')}}"
             class="pull-left btn btn-info"  data-toggle="tooltip" data-placement="top"
            ><i class="icon-plus"> </i>  </a>
            <i class="clearfix"></i>
  </div>

  <div class="panel-body">
 <div id="img_load_zoom">

                 </div>
    <div class="table-responsive">
      <form id="search_form" method="get" action="{{ route('product.index') }}">


      <table style="font-size: 13px;" class=" table-condensed table table-striped table-advance table-hover" style="width: 100%">
      <thead>

          <tr>
            <th>ردیف</th>
            <th>تصویر</th>
            <th>عنوان محصول</th>
            <th>تاریخ انتشار</th>
            <th>وضعیت  </th>
            <th> تعداد فروش </th>

            <th>دستورات</th>
          </tr>
            <tr>
            <td></td>
            <td></td>
            <td><input type="text"
             value="{{ array_key_exists('title', $data) ? $data['title'] : '' }}"
              class="form-control search_input" name="title"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
      </thead>

        <tbody>


         <?php $image_name = array(); $i=1;   ?>
          @foreach($products as $key=>$product)
          <tr>


            <td class="text-center">{{ $i }}</td>
            <td style="width: 15%" class="text-center">

              @if($product->get_image)
              <?php $image_name[]=$key; ?>
                <img id="p_img_{{ $key }}" class="img-responsive" src="{{asset('upload/product_image/'.$product->get_image->url)}}"
                data-zoom-image="{{asset('upload/product_image/'.$product->get_image->url)}}">
               @endif

            </td>
            <td style="width:40%;border-left:1px solid silver;" class="text-center">{{ $product->title}}
            <div class="product_item_admin">
              <a title="گالری"  class="op"
              data-toggle="tooltip" data-placement="top"
              href="{{url('admin/product/gallery/'.$product->id)}}">
            گالری محصول
              </a>
              <a title="ثبت گارانتی" class="op"
              data-toggle="tooltip" data-placement="top"
              href="{{url('admin/service/create/?product_id='.$product->id)}}">
              ثبت گارانتی
              </a>
              <a class="op"  title="نقد و برسی تخصصی"
              data-toggle="tooltip" data-placement="top"
              href="{{url('admin/product/add-review?product_id='.$product->id)}}">
            نقد و برسی
              </a>
              <a class="op"  title="ثبت مشخصات تخصصی"
              data-toggle="tooltip" data-placement="top"
              href="{{url('admin/add-item-product/'.$product->id)}}">
              مشخصات فنی
              </a>
                <a class="op"  title="ثبت فیلتر"
              data-toggle="tooltip" data-placement="top"
              href="{{url('admin/add-filter-product/'.$product->id)}}">
            فیلتر محصول
              </a>
            </div>
            </td>
            <td class="text-center">
          <?php

          $jdf = new App\lib\JDF();
          $date = $product->created_at;

          $date = explode(' ', $date);
          $e = explode('-', $date[0]);
          //تبدیل تاریخ میلادی به شمسی
           $e =  $jdf->gregorian_to_jalali($e[0],$e[1],$e[2],'-');
           echo $e;
          ?>
            </td>
            <td class="text-center">
            @if($product->product_status)
             <span style="color:green">موجود</span>
             @else
              <span style="color:red">ناموجود</span>
            @endif
            </td>
           <td class="text-center">{{$product->order_product}}</td>
            <td class="text-center" >
              <a  class="op"  href="{{route('product.edit',$product->id)}}"
              style="color:#368bff;"  data-toggle="tooltip" data-placement="top"
                title="ویرایش محصول"   >
                <i class="icon-edit"></i>
              </a>

              <a title="حذف محصول"  class="op"
              data-toggle="tooltip" data-placement="top"
                 onclick="del_row('{{$product->id }}','{{ url('admin/product')}}','{{ Session::token() }}')"
              >
                  <i class="icon-trash"></i>
              </a>


            </td>
          </tr>
              @php $i++  @endphp
          @endforeach
           @if(!$products->count())
          <tr>
            <td colspan="7"><span style="display: block; text-align: center;font-size: 15px;">
              رکوردی یافت نشد
            </span></td>
          </tr>
          @endif

        </tbody>
      </table>
       </form>
    </div>

  </div>

 </div>
          {{$products->links()}}
@endsection
@section('footer')
<script type="text/javascript">
 $(".search_input").keydown(function(event) {
   if(event.keyCode==13){
    $("#search_form").submit();
  }
 });


</script>

<script type="text/javascript" src="{{asset('js/jquery.elevatezoom.js')}}">
</script>

@stop
