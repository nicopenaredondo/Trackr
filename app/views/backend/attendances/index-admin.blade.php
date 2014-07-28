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
	@if(count($listOfAttendances) > 0)
	<div class="row">
		<div class="col-md-12">
			<a href="" class="btn btn-info pull-right"><i class="fa fa-print"></i>
				Export To Excel
			</a>
		</div>
	</div>
	<div class="row" style="margin-top:10px;">
		<div class="col-md-12">
			<table class="table table-bordered table-striped">
				<thead>
					<tr class="success">
						<th colspan="6">Attendance as of {{ $dateToday }}</th>
					</tr>
					<tr>
						<th>Username</th>
						<th>Time In</th>
						<th>Time Out</th>
						<th>Total Hours</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($listOfAttendances as $attendance)
					<tr>
						<td>{{ $attendance->users->username; }}</td>
						<td>{{ $attendance['time_in'] }}</td>
						<td>{{ ($attendance['time_out']) }}</td>
						<td>{{ $attendance['total_hours'] }}</td>
						<td>{{ $attendance['status']  }}</td>
						<td><a href="{{ URL::route('attendances.edit', $attendance['attendance_id']) }}" class="btn btn-xs btn-success"><i class="fa fa-eye"></i> Edit Attendance</a></td>
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