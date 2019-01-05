
@extends('layouts.admin')
@section('title','افزودن فیلتر محصول')
@section('content')

 <div class="box_div">

  <div class="my_title"> 
  افزودن فیلتر محصول  - {{$product->title}}
  </div>

  
  
    <div class="table-responsive">
   
        <?php
        var_dump($filter_value);
         function filter_active($filter_value,$value1,$value2){
          $k=$value1.'_'.$value2;
           if(array_key_exists($k,$filter_value )){
             return true;
           }else{
            return false;
           } 
       
         }

        ?>
           
       {!!Form::open(['url'=>'admin/add-filter-product'])!!}
         <input type="hidden" name="id" value="{{$product->id}}">
         <table class="table ">
            @foreach($filters as $key =>$value)
          <tr>
            <td>  
             
              <span class="red">{{$value->name}}</span> 
            </td>
          </tr>
          @foreach($value->childs as $key2 =>$value2)
              <tr>

                <td>
                  @if($value2->filed=='1')
                  <input type="radio" name="filter[{{ $value->id }}]" value="{{ $value2->id }}"
                 @if(filter_active($filter_value,$value->id,$value2->id))
                   checked="true" 
                @endif
                  >
                    
                  <span>{{ $value2->name }}</span>
                  @else
                  <input type="checkbox" name="filter2[{{ $value->id }}][{{ $value2->id }}]" value="{{ $value2->id }}"   
                    @if(filter_active($filter_value,$value->id,$value2->id))
                   checked="true" 
                @endif
                  >
                 <span style="width: 70px;display: inline-block;margin-right: 5px;"> {{ $value2->name }}</span>
                 <span class="box-color" style="background-color:#{{ $value2->ename }}">
                   
                 </span>
                  @endif
                </td>
              </tr>
          @endforeach  
        
             
           @endforeach

         </table>
         
          <div class="form-group">
            <input type="submit" value="ذخیره کن" class="btn btn-primary" name="">
          </div>

          {!!Form::close()!!}
    </div>
  
 </div>
@endsection