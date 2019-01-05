
@extends('layouts.admin')
@section('title','نمایش گارانتی')
@section('header')
 
@endsection
@section('content')



 


 <div class="panel panel-default">

 	<div class="panel-heading"> نمایش گارانتی محصول - {{$product->title}} 
     <a title="افزودن گارانتی" href="{{url('admin/service/create?product_id='.$product->id)}}"
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
            <th>نام گارانتی</th>
 					 
            <th>دستورات</th>
 					</tr>
 			</thead>
 				<tbody>
      

 					@foreach($service as $key=>$value)
 					<tr>
 						<td>{{ $key+1  }}</td>
 						<td>{{ $value->service_name }}</td>
            
 						<td >
 							<a href="{{url('admin/service/'.$value->id.'/edit?product_id='.$value->product_id)}}" 
              style="color:#368bff;"  data-toggle="tooltip" data-placement="top"title="ویرایش گارانتی"><i class="icon-edit"></i></a>
              <a title="حذف گارانتی" style="color: red;cursor: pointer;padding-right: 5px;"
              data-toggle="tooltip" data-placement="top"
                 onclick="del_row('{{$value->id }}','{{ url('admin/service')}}','{{ Session::token() }}')" ><i class="icon-trash"></i></a>
                  <a href="{{url('admin/service/'.$value->id.'?product_id='.$value->product_id)}}" > eye</a>
 						</td>
 					</tr>
 					@endforeach

           @if(!$service->count())
          <tr>
            <td colspan="3"><span style="display: block; text-align: center;font-size: 15px;">
              رکوردی یافت نشد
            </span></td>
          </tr>
          @endif

 				</tbody>
 			</table>
    </div>
      
  </div>
 
 </div>
		 			{{$service->appends(['product_id' =>$product->id])}}

@endsection

            
          
           
        
        

            
          
 
    
 



        
        
           
             
           
            
  
              
      
 






 