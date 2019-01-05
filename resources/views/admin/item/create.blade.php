@extends('layouts.admin') 
@section('title','افزودن مشخصات محصول') @section('header')
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-select.css')}}"> 
@endsection @section('content') 



<div class="panel panel-primary" >
    <div class="panel-heading">
        افزودن مشخصات محصول
    </div>
    <div class="panel-body">

        <div class="input-group form-group">
            <span class="input-group-addon">انتخاب دسته</span> 
            {!!Form::select('cat_list',$cat_list,( $id ? $id :'null'),['class'=>'selectpicker','id'=>'cat_list','data-live-search'=>'true','onchange'=>'get_filter()'])!!}
        </div>
        @if(!empty($id)) {!!Form::open(array('url'=>'admin/item?id='.$id))!!}@endif


        <div id="item-box" class="form-group">


       @foreach($items as $key=>$value)
        <div class="product_item_div form-group" id="item_div-{{$value->id}}">
      <input type="text" value="{{$value->name}}"  class="my_input" style="width: 300px;"    name="item_name[{{$value->id}}]">
        @foreach($value->childs as $key2=>$value2)
      <div class="child_item " style="margin-top:15px;" id="child_item-{{$value2->id}}">
      <input class="my_input" value="{{$value2->name}}" type="text" name="child_item_name[{{$value->id}}][{{$value2->id}}]">
      <select class="my_input" name="child_item_filed[{{$value->id}}][{{$value2->id}}]">
      <option @if($value2->filed==1) selected="selected" @endif value="1">Select</option>
      <option @if($value2->filed==2) selected="selected" @endif value="2">Text</option>
      <option value="3" @if($value2->filed==3) selected="selected" @endif>TextArea</option>
      </select>
     </div>

   @endforeach

      </div>
      <div class="form-group"><span style="color: red" 
        onclick="add_child_item('item_div-{{$value->id}}',{{$value->id}})" ><i class="icon-plus"></i></span></div>
       @endforeach
          
        </div>
           
               
            




        @if(isset($id))
        <p>
            <span style="color: red" onclick="add_item()"><i class="icon-plus"></i></span>
        </p>

        {!!Form::submit('ذخیره شو',['class'=>'btn btn-success'])!!} {!!Form::close()!!} 
        @endif
    @endsection @section('footer')
    <script type="text/javascript" src="{{asset('js/bootstrap-select.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/defaults-fa_IR.min.js')}}"></script>
     

    <script type="text/javascript" src="{{asset('js/filter.js')}}"></script>

    <script type="text/javascript">
        get_filter = function() {
            var id = document.getElementById('cat_list').value;
            window.location = '{{url("admin/item")}}?id=' + id;
        }
    </script>
    @endsection



















    

