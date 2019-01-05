@extends('layouts.admin') @section('title','افزودن فیلتر محصولات') @section('header')
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-select.css')}}"> @endsection @section('content') @section('header') @endsection



<div class="panel panel-primary" id="p">
    <div class="panel-heading">
        افزودن فیلتر محصولات
    </div>



    <div class="panel-body">





        <p class="input-group">
            <span class="input-group-addon">انتخاب دسته</span> 
            {!!Form::select('cat_list',$cat_list,( $id ? $id :'null'),['class'=>'selectpicker','id'=>'cat_list','data-live-search'=>'true','onchange'=>'get_filter()'])!!}


        </p>
        @if(!empty($id)) {!!Form::open(array('url'=>'admin/filter?id='.$id,'file'=>'true'))!!} @endif

        <div id="filter-box" class="form-group">


            @foreach($filters as $key=>$value)
            <div class="product_filter_div" id="filter_div-{{$value->id}}">
                <input type="text" value="{{$value->name}}" class="my_input" name="filter_name[{{$value->id}}]">
                <input type="text" class="my_input" value="{{$value->ename}}" name="filter_ename[{{$value->id}}]">
                <select style="margin-right:10px;" id="filter_filed-{{$value->id}}" name="filter_filed[{{$value->id}}]" class="my_input">
                     <option  value="1" @if($value->filed==1) selected="selected"  @endif>Radio</option>
                     <option value="2" @if($value->filed==2) selected="selected"  @endif>Color</option>
           </select>

             @foreach($value->childs as $key2=>$value2)
               <div class="child_filter" id="child_filter-{{$value2->id}}" >
                @if($value->filed==1)
                <input type="text" class="my_input" value="{{$value2->name}}" style="margin-top:10px;" name="filter_child[{{$value->id}}][{{$value2->id}}]">
                @else
                <input type="text" class="my_input" value="{{$value2->name}}" style="margin-top:10px;" name="filter_child[{{$value->id}}][{{$value2->id}}]">
                <input type="text" value="{{$value2->ename}}" class="my_input jscolor" name="color_code[{{$value->id}}][{{$value2->id}}]">
                @endif
                <label>id is : {{ $value2->id }} </label>
                
                 
               </div>

             @endforeach

            </div>

            <div>
                <span style="color:red" 
                onclick="add_child_filter('filter_div-{{$value->id}}',{{$value->id}},'child_filter_')"><i class="icon-plus"></i>
               </span>
            </div>
            @endforeach


        </div>






        @if(isset($id))
        <p>
            <span style="color: red" onclick="add_filter()"><i class="icon-plus"></i></span>
        </p>

        {!!Form::submit('ذخیره شو',['class'=>'btn btn-success'])!!} {!!Form::close()!!} @endif


    </div>

    @endsection @section('footer')
    <script type="text/javascript" src="{{asset('js/bootstrap-select.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/defaults-fa_IR.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jscolor.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/filter.js')}}"></script>

    <script type="text/javascript">
        get_filter = function() {
            var id = document.getElementById('cat_list').value;
            window.location = '{{url("admin/filter")}}?id=' + id;
        }
    

    </script>
    @endsection
