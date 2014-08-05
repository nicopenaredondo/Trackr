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
	<div class="row" style="margin-top:10px;">
		{{ Form::open(['route' => 'attendances.index', 'method' => 'GET']) }}
		<div class="col-md-4">
			<div class="input-group custom-search-form">
		    <input type="text" class="form-control datepicker" value="{{ Input::get('query') }}" name="query" placeholder="Search attendance date.." value="">
		    <span class="input-group-btn">
		      <button class="btn btn-primary" type="submit">
			      <span class="glyphicon glyphicon-search"></span>
			    </button>
		    </span>
		 	</div>
		</div>
		{{ Form::close() }}
	</div>
	@if(count($listOfAttendances) > 0)
	<div class="row" style="margin-top:10px;">
		<div class="col-md-12">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title">Attendance as of {{ $date }}</h3>
					<div class="right-content">
						<a href="" class="btn btn-xs btn-success">
							<i class="fa fa-print"></i> Print Attendance
						</a>
					</div>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-th-block table-primary table-striped">
							<thead>
								<tr>
									<th>Name</th>
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
									<td>{{ $attendance->users->userProfile->first_name. ' ' .$attendance->users->userProfile->last_name }}</td>
									<td>{{ $attendance['time_in'] }}</td>
									<td>{{ ($attendance['time_out']) }}</td>
									<td>{{ $attendance['total_hours'] }}</td>
									<td>{{ $attendance['status']  }}</td>
									<td>
										@if(in_array('edit', $permittedAction))
											<a href="{{ URL::route('attendances.edit', $attendance['attendance_id']) }}" class="btn btn-xs btn-success"><i class="fa fa-eye"></i> Edit Attendance</a>
										@endif
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 text-center">
			{{ $listOfAttendances->appends(['query' => Input::get('query')])->links() }}
		</div>
	</div>
	@else
		<div class="alert alert-info square fade in alert-dismissable" style="margin-top:10px;">
		  <strong>Information!</strong> The system doesn't have any attendance records
		</div>
	@endif
@stop