
@extends('layouts.admin')
@section('title','نمایش محصولات شگفت انگیز')
@section('content')


@if(session()->has('success'))
<div class="alert alert-success alert-dismissable">
<button class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
{{session('success')}}
</div>
@endif



 <div class="panel panel-default">

<div class="panel-heading"> نمایش و مدریت پیشنهاد های شگفت انگیز
<a title="اضافه نمودن پیشنهاد شگفت انگیز جیدد" href="{{url('admin/amazing/create')}}"
class="pull-left btn btn-success"  data-toggle="tooltip" data-placement="top"
><i class="icon-plus"> </i>  </a>
<i class="clearfix"></i>
</div>


 	<div class="panel-body">

 		<div class="table-responsive">
 			<table style="font-size: 11px;" class=" table-condensed table table-striped table-advance table-hover" style="width: 100%">
 			<thead>
 					<tr>
 						<th>ردیف</th>
            <th>عنوانک </th>
 						<th>عنوان محصول</th>
 						<th>قیمت محصول</th>
 						<th>قیمت شگفت انگیز محصول </th>
             <th>مدت زمان پیشنهاد شگفت انگیز</th>
            <th>دستورات</th>
 					</tr>
 			</thead>

 				<tbody>

 					@php $i=0; @endphp
 					@foreach($amazings as $amazing)
 					<tr>

 						<td>{{ $i++ }}</td>
            <td>{{ $amazing->m_title }}</td>
 						<td>{{ $amazing->title }}</td>
            <td>{{ $amazing->price1 }}</td>
            <td>{{ $amazing->price2 }}</td>
 						<td>{{ $amazing->time }}</td>



 				<td >
            <a href="{{url('admin/amazing'.'/'.$amazing->id.''.'/edit')}}"
            style="color:#368bff;"  data-toggle="tooltip" data-placement="top"
            title="ویرایش پیشنهاد شگفت انگیز"   >
            <i class="icon-edit"></i>
            </a><a title="حذف پیشنهاد شگفت انگیز" style="color: red;cursor: pointer;padding-right: 5px;" data-toggle="tooltip" data-placement="top"
            onclick="del_row('{{$amazing->id }}','{{ url('admin/amazing')}}','{{ Session::token() }}')" ><i class="icon-trash"></i></a></td>
 					</tr>

 					@endforeach
           @if(!$amazings->count())
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
		 			{{$amazings->links()}}



@endsection
@section('footer')

@endsection
