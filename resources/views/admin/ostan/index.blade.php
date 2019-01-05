
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
  <a href="{{url('admin/ostan/create')}}" class="btn btn-success pull-left" title="جدید">
      <i class="icon-plus"></i>
  </a>
     
            <i class="clearfix"></i>
 	</div>
 
 	<div class="panel-body">
 	
 		<div class="table-responsive">
 			<table style="font-size: 11px;" class=" table-condensed table table-striped table-advance table-hover" style="width: 100%">
 			<thead>
 					<tr>
 						<th>ردیف</th>
 						<th>نام استان</th>
                       <th>دستورات</th>
 					
 					</tr>
 			</thead>
           
 				<tbody>
        
 					@php $i=1; @endphp
 					@foreach($ostans as $ostan)
 					<tr>
 					
 						<td>{{ $i }}</td>
 						<td>{{ $ostan->ostan_name }}</td>
 				
 				

 						<td >
 							<a href="{{route('ostan.edit',$ostan->id)}}" 
              style="color:#368bff;"  data-toggle="tooltip" data-placement="top"
                title="ویرایش "   >
                <i class="icon-edit"></i>
 							</a>

              <a title="حذف " style="color: red;cursor: pointer;padding-right: 5px;"
              data-toggle="tooltip" data-placement="top"
                 onclick="del_row('{{$ostan->id }}','{{ url('admin/ostan')}}','{{ Session::token() }}')" 
              >
                  <i class="icon-trash"></i>
              </a>
 						</td>
 					</tr>
              @php $i++  @endphp
 					@endforeach
           @if(!$ostans->count())
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
{{$ostans->links()}}
 
 
    
 
@endsection
@section('footer')

@endsection


        
        
           
             
           
            
  
              
      
 






 