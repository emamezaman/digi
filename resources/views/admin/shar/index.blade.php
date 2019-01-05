
@extends('layouts.admin')
@section('title','مدریت شهر')
@section('content')


@if(session()->has('success'))
<div class="alert alert-success alert-dismissable">
    <button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
           {{session('success')}}
</div>
@endif
 


 <div class="panel panel-default">

 	<div class="panel-heading"> مدیریت شهر
  <a href="{{url('admin/shar/create')}}" class="btn btn-success pull-left" title="جدید">
      <i class="icon-plus"></i>
  </a>
     
            <i class="clearfix"></i>
 	</div>
 
 	<div class="panel-body">
 	
 		<div class="table-responsive">
 			<table style="font-size: 13px;" class=" table-condensed table table-striped table-advance table-hover" style="width: 100%">
 			<thead>
 					<tr>
 						<th>ردیف</th>
 						<th>شهر</th>
 						<th>نام استان</th>
                       <th>دستورات</th>
 					
 					</tr>
 			</thead>
           
 				<tbody>
        
 					@php $i=1; @endphp
 					@foreach($shars as $shar)
 					<tr>
 					
 						<td>{{ $i }}</td>
 						<td>{{ $shar->shar_name }}</td>
 						<td>{{ $shar->get_ostan_name->ostan_name }}</td>
 				
 				

 						<td >
 							<a href="{{route('shar.edit',$shar->id)}}" 
              style="color:#368bff;"  data-toggle="tooltip" data-placement="top"
                title="ویرایش "   >
                <i class="icon-edit"></i>
 							</a>

              <a title="حذف " style="color: red;cursor: pointer;padding-right: 5px;"
              data-toggle="tooltip" data-placement="top"
                 onclick="del_row('{{$shar->id }}','{{ url('admin/shar')}}','{{ Session::token() }}')" 
              >
                  <i class="icon-trash"></i>
              </a>
 						</td>
 					</tr>
              @php $i++  @endphp
 					@endforeach
           @if(!$shars->count())
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
{{$shars->links()}}
 
 
    
 
@endsection
@section('footer')

@endsection


        
        
           
             
           
            
  
              
      
 






 