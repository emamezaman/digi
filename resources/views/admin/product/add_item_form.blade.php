
@extends('layouts.admin')
@section('title','افزودن مشخصات تخصصی')
@section('content')

 <div class="panel panel-default">

  <div class="panel-heading"> 
  افزودن مشخصات تخصصی محصول - {{$product->title}}
  </div>

  <div class="panel-body">
  
    <div class="table-responsive">
   
    
           
       {!!Form::open(['url'=>'admin/add-item-product'])!!}
         <input type="hidden" name="product_id" value="{{$product->id}}">
          @foreach($items as $key =>$value)
          
             <div  style="font-size: 18px;color:#fb3406;background-color: #6fd9f1;border-radius: 5px;padding: 7px;margin-bottom: 10px;border-bottom: 4px solid #f51b05">
              {{$value->name}} 
             </div>
             
        
              @foreach($value->childs as $key2=>$value2)
                
                <div class="form-group input-group">
               <span  class="input-group-addon">{{$value2->name}}</span>
                    @if($value2->filed==1)
                     <select class="form-control" style="padding-bottom: 0;padding-top: 0;" name="val[{{$value2->id}}]">
                      <option value="">انتخاب نمائید</option>
                       <option value="1"
                    <?php if(!empty($value2->get_value_item->value) && $value2->get_value_item->value==1){echo 'selected="selected"' ;} ?>
                       >بلی</option>
                       <option value="2" <?php if(!empty($value2->get_value_item->value) && $value2->get_value_item->value==2){echo 'selected="selected"' ;} ?>>خیر</option>
                       <option value="3" <?php if(!empty($value2->get_value_item->value) && $value2->get_value_item->value==3){echo 'selected="selected"' ;} ?>>دارد</option>
                       <option value="4" <?php if(!empty($value2->get_value_item->value) && $value2->get_value_item->value==4){echo 'selected="selected"' ;} ?>>ندارد</option>
                     </select>
                    @elseif($value2->filed==2)
                   
                      <input type="text" 
                      value="<?php if(!empty($value2->get_value_item->value)){echo $value2->get_value_item->value;} ?>"

                       name="val[{{$value2->id}}]" class="form-control" >
                    
                    @else
                    <textarea rows="6" style="resize: none;" class="form-control" name="val[{{$value2->id}}]">
                      <?php if(!empty($value2->get_value_item->value)){echo $value2->get_value_item->value;} ?>
                    </textarea>
                    @endif
                </div>
              @endforeach
          @endforeach
          <div class="form-group">
            <input type="submit" value="ذخیره کن" class="btn btn-primary" name="">
          </div>

          {!!Form::close()!!}
    </div>
  </div>
 </div>
@endsection