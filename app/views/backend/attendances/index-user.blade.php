@extends('backend.layouts.master')
@section('site_title')
List of Attendance Page
@stop
@section('content')
	<!-- Begin page heading -->
	<h1 class="page-heading">List of Attendance <small>Displays all the list of attendance registered in the system</small></h1>
	<!-- End page heading -->

	<!-- Begin breadcrumb -->
	<ol class="breadcrumb default square rsaquo sm">
		<li><a href="{{ URL::route('app.dashboard') }}"><i class="fa fa-home"></i></a></li>
		<li class="active">List of Attendance</li>
	</ol>
	<!-- End breadcrumb -->

	@include('notification')

	@if($isLogin == true)
		@if($isLogout == false)
		{{ Form::open(['route' => 'attendances.store']) }}
		<button type="submit"  class="btn btn-lg btn-primary">Logout</button>
		@endif
	@else
		{{ Form::open(['route' => 'attendances.store']) }}
		<button type="submit"  class="btn btn-lg btn-primary">Login</button>
	@endif

	{{ Form::close() }}
	@if(count($listOfAttendances) > 0)
	<div class="row" style="margin-top:10px;">
		<div class="col-md-12">
			<table class="table table-hover table-striped">
				<thead>
					<tr>
						<th>Time In</th>
						<th>Time Out</th>
						<th>Total Hours</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					@foreach($listOfAttendances as $attendance)
					<tr>
						<td>{{ $attendance['time_in'] }}</td>
						<td>{{ $attendance['time_out'] }}</td>
						<td>{{ $attendance['total_hours'] }}</td>
						<td>{{ $attendance['status']  }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 text-center">
			{{ $listOfAttendances->links() }}
		</div>
	</div>
	@else
		<div class="alert alert-info square fade in alert-dismissable" style="margin-top:10px;">
		  <strong>Information!</strong> You don't have any attendance records in the system.
		</div>
	@endif
@stop