
@extends('layouts.admin')
@section('title','مدریت اسلایدر')
@section('content')


@if(session()->has('success'))
<div class="alert alert-success alert-dismissable">
    <button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
           {{session('success')}}
</div>
@endif
 


 <div class="panel panel-primary">

 	<div class="panel-heading"> مدیریت اسلایدر 
     <a title="اضافه نمودن اسلایدر" href="{{route('slider.create')}}"
             class="pull-left btn btn-info"  data-toggle="tooltip" data-placement="top"
            ><i class="icon-plus"> </i>  </a>
            <i class="clearfix"></i>
 	</div>
 
 	<div class="panel-body">
 	
 		<div class="table-responsive">
 			<table style="font-size: 11px;" class=" table-condensed table table-striped table-advance table-hover" style="width: 100%">
 			<thead>
 					<tr>
 						<th>ردیف</th>
 						<th>عنوان اسلایدر</th>
            <th>تصویر اسلایدر</th>
            <th>دستورات</th>
 					</tr>
 			</thead>
             
           
           
 				<tbody>
 					@php $i=1; @endphp
 					@foreach($sliders as $slider)
 					<tr>
 						<td>{{ $i }}</td>
 						<td style="width: 200px;">{{ $slider->title }}</td>
 				  	 <td>
                <img src="{{asset('upload/slider_image/'.$slider->image)}}" 
                 class="img-responsive"  style="width: 40%" 
                 alt="{{$slider->title}}" >
             </td>
 						<td>
 							<a href="{{route('slider.edit',$slider->id)}}" 
              style="color:#368bff;"  data-toggle="tooltip" data-placement="top"
                title="ویرایش اسلایدر">
                <i class="icon-edit"></i>
 							</a>

              <a title="حذف اسلایدر" style="color: red;cursor: pointer;padding-right: 5px;"
              data-toggle="tooltip" data-placement="top"
                 onclick="del_row('{{$slider->id }}','{{ url('admin/slider')}}','{{ Session::token() }}')" 
              >
                  <i class="icon-trash"></i>

 					</tr>
              @php $i++  @endphp
 					@endforeach
           @if(!$sliders->count())
          <tr>
            <td colspan="4"><span style="display: block; text-align: center;font-size: 15px;">
              رکوردی یافت نشد
            </span></td>
          </tr>
          @endif
          
 				</tbody>
 			</table>
    </div>
      
  </div>
  </form>
 </div>
          {{$sliders->links()}}
 
@endsection
@section('footer')
@endsection
              </a>
            </td>
             
    
          
              
             
         
           
          

           
            
     
        

 
    



        
        
           
             
           
            
  
              
      
 






 