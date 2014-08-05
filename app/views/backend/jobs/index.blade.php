@extends('backend.layouts.master')
@section('site_title')
List of Jobs Page
@stop
@section('content')
	<!-- Begin page heading -->
	<h1 class="page-heading">List of Jobs <small>Displays all the list of jobs registered in the system</small></h1>
	<!-- End page heading -->

	<!-- Begin breadcrumb -->
	<ol class="breadcrumb default square rsaquo sm">
		<li><a href="{{ URL::route('app.dashboard') }}"><i class="fa fa-home"></i></a></li>
		<li class="active">List of Jobs</li>
	</ol>
	<!-- End breadcrumb -->

	@include('notification')
	@if(in_array('add', $permittedAction))
	<div class="row" style="margin-top:10px;">
		<div class="col-md-12">
			<a href="{{ URL::route('jobs.create') }}" class="btn btn-info">
			<i class="fa fa-plus"></i>
				Add new job
			</a>
		</div>
	</div>
	@endif
	@if(count($listOfJobs) > 0)
	<div class="row" style="margin-top:10px;">
		<div class="col-md-12">
			<table class="table table-condensed table-striped">
				<thead>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Description</th>
						<th>Department</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($listOfJobs as $job)
					<tr>
						<td>{{ $job['job_id'] }}</td>
						<td>{{ $job['job_name'] }}</td>
						<td>{{ $job['job_description'] }}</td>
						<td>{{ $job['department']['department_name'] }}</td>
						<td><a href="{{ URL::route('jobs.show', $job['job_id']) }}" class="btn btn-xs btn-success"><i class="fa fa-eye"></i> View Department</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 text-center">
			{{ $listOfJobs->links() }}
		</div>
	</div>
	@else
		<div class="alert alert-info square fade in alert-dismissable" style="margin-top:10px;">
		  <strong>Information!</strong> You don't have any jobs in the system. Would you like to create
		  <a href="{{ URL::route('jobs.create') }}" class="alert-link">one </a>?
		</div>
	@endif
@stop