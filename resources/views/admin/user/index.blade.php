@extends('layouts.admin')

@section('title','نمایش و مدریت کاربران')

@section('content')

<div class="panel">
	<div class="panel-heading">
		نمایش و مدریت کاربران
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-bordered table-striped text-center">
				<thead>
					<tr>
						<th>ردیف </th>
						<th>نام  کاربر</th>
						<th>تاریخ عضویت </th>
						<th>نقش کاربر</th>
						<th>دستورات</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($users as $key=>$value)
					<tr>
						<td>{{ ++$key }}</td>
						<td>{{ $value->username }}</td>
						<?php 
						$d= explode(' ', $value->created_at);
						$d = explode('-', $d[0]);
						 $jdf = new App\lib\JDF;
						 
						 $d = $jdf->gregorian_to_jalali($d[0],$d[1],$d[2],'-');
						 
						?>
						<td>{{ $d }}</td>
						<td>
							@if($value->role=='admin')
                              مدیر
                              @else
							کاربر عادی
							  @endif
						</td>
						<td>
						<span onclick="del_row('{{ $value->id }}','{{ url('admin/user') }}','{{ Session::token() }}')" class="icon-trash" title="حذف"></span>
						<a href="{{ url('admin/user/'.$value->id).'/edit' }}">
							<span class="icon-edit"></span>
						</a>
						<a href="{{ url('admin/user/'.$value->id) }}"><span class="eye"></span></a>
						</td>
						
					</tr>	
					@endforeach
				</tbody>
			</table>
		</div>
		{{ $users->links() }}
	</div>
</div>

@endsection