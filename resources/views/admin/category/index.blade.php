
@extends('layouts.admin')
@section('title','مدریت دسته ها')
@section('content')


@if(session()->has('success'))
<div class="alert alert-success alert-dismissable">
    <button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
           {{session('success')}}
</div>
@endif
 


 <div class="panel panel-primary">

 	<div class="panel-heading"> مدیریت دسته ها 
     <a title="اضافه نمودن دسته جدید" href="{{route('category.create')}}"
             class="pull-left btn btn-info"  data-toggle="tooltip" data-placement="top"
            ><i class="icon-plus"> </i>  </a>
            <i class="clearfix"></i>
 	</div>
<form id="search_form" action="{{url('admin/category')}}" >
 	<div class="panel-body">
 	
 		<div class="table-responsive">
 			<table style="font-size: 13px;" class=" table-condensed table table-striped table-advance table-hover" style="width: 100%">
 			<thead>
 					<tr>
 						<th>ردیف</th>
 						<th>عنوان فارسی دسته</th>
 						<th>عنوان انگلیسی دسته</th>
 						<th>سر دسته </th>
            {{-- <th>تصویر دسته</th> --}}
            <th>دستورات</th>
 					</tr>
 			</thead>
           
 				<tbody>
          <tr>
            <td></td>
            <td><input type="text" 
            value="@if(array_key_exists('title_fa', $data)){{$data['title_fa']}}@endif"
             name="title_fa" class="form-control search_input"></td>
            <td><input type="text"
                value="@if(array_key_exists('title_en', $data)){{$data['title_en']}}@endif" 
             name="title_en" class="form-control search_input"></td>
            <td></td>
            <td></td>
          </tr>
 					@php $i=1; @endphp
 					@foreach($categories as $category)
 					<tr>
 					
 						<td>{{ $i }}</td>
 						<td>{{ $category->title_fa }}</td>
 						<td>{{ $category->title_en }}</td>
 					 	<td>
              {{ 
            (!empty($category->getParent) ? $category->getParent->title_fa :'-') 
              }}
          </td>

 					{{-- 	<td style="width: 10%">
              @if($category->image)
 								<img src="{{asset('upload/category_image/'.$category->image)}}" 
                                                        alt="{{$category->title}}" 
 							class="img-thumbnail img-rounded" class="img-responsive">
              @else
             -
 							@endif
             
 						</td> --}}
 				

 						<td >
 							<a href="{{route('category.edit',$category->id)}}" 
              style="color:#368bff;"  data-toggle="tooltip" data-placement="top"
                title="ویرایش دسته"   >
                <i class="icon-edit"></i>
 							</a>

              <a title="حذف دسته" style="color: red;cursor: pointer;padding-right: 5px;"
              data-toggle="tooltip" data-placement="top"
                 onclick="del_row('{{$category->id }}','{{ url('admin/category')}}','{{ Session::token() }}')" 
              >
                  <i class="icon-trash"></i>
              </a>
 						</td>
 					</tr>
              @php $i++  @endphp
 					@endforeach
           @if(!$categories->count())
          <tr>
            <td colspan="5"><span style="display: block; text-align: center;font-size: 15px;">
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
		 			{{$categories->links()}}
 
    
 
@endsection
@section('footer')
<script type="text/javascript">
  $(".search_input").on('keydown', function(event){
  if(event.keyCode==13){
    $("#search_form").submit();
  }
  });

</script>
@endsection


        
        
           
             
           
            
  
              
      
 






 