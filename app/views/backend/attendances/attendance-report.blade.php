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
		<li><a href="{{ URL::route('attendances.index') }}">List of Attendance</a></li>
		<li class="active">Attendance Report</li>
	</ol>
	<!-- End breadcrumb -->

	@include('notification')

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-success">
			  <div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-calendar"></i> Attendance Report</h3>
				</div>
			  <div class="panel-body">
				<div class="row">
					<div class="col-md-4">
						{{ Form::open(['method' => 'GET','route' => 'attendances.attendance-report']) }}
						<div class="form-group">
							<label>Choose start date</label>
							<input type="text" name="from" value="{{ Input::get('from') }}" class="form-control datepicker"  placeholder="Enter Start Date">
						</div>
						<div class="form-group">
							<label>Choose end date</label>
							<input type="text" name="to" value="{{ Input::get('to') }}" class="form-control datepicker" placeholder="Enter End Date">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success btn-block">
								Submit
							</button>
						</div>
						{{ Form::close() }}
					</div>
					<div class="col-md-8">
						@if(count($listOfAttendances) > 0)
						<div class="table-responsive">
							<a href="{{ URL::route('attendances.attendance-report.print') }}" class="btn btn-xs btn-success pull-right">
								<i class="fa fa-print"></i> Print Attendance
							</a>
							<table class="table table-th-block table-primary table-hovered">
								<thead>
									<tr>
										<th width="20%">Date</th>
										<th width="60%">Remarks</th>
										<th width="20%" class="text-center">Total Hours</th>
									</tr>
								</thead>
								<tbody>
									@foreach($listOfAttendances as $attendance)
									<tr>
										<td>{{ date('F j, Y', strtotime($attendance['created_at'])) }}</td>
										<td>{{ $attendance['remarks'] }}</td>
										<td class="text-center">{{ $attendance['total_hours'] }}</td>
									</tr>
									@endforeach
									<tr>
										<td colspan="2" class="text-right">
											<strong>Total Hours</strong>
										</td>
										<td class="text-center text-danger">
											<strong>{{ $accumulatedHours }}</strong>
										</td>
									</tr>
								</tbody>
							</table>
						</div><!-- /.table-responsive -->
						@else
							<div class="alert alert-info square fade in alert-dismissable" style="margin-top:10px;">
							  <strong>Information!</strong> The system can't find any record from the date that you've specified
							</div>
						@endif
					</div>
				</div>
			  </div><!-- /.panel-body -->
			</div>
		</div>
	</div>
	<div class="row">

@stop