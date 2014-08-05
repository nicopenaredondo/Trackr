@extends('backend.layouts.master')
@section('site_title')
Job Details Page
@stop
@section('content')
	<!-- Begin page heading -->
	<h1 class="page-heading">Job Details Page <small>Displays the job details</small></h1>
	<!-- End page heading -->

	<!-- Begin breadcrumb -->
	<ol class="breadcrumb default square rsaquo sm">
		<li><a href="{{ URL::route('app.dashboard') }}"><i class="fa fa-home"></i></a></li>
		<li><a href="{{ URL::route('jobs.index') }}">List of Job</a></li>
		<li class="active">{{ $job['job_name'] }} </li>
	</ol>
	<!-- End breadcrumb -->

	@include('notification')
	<div class="row">
		<div class="col-md-12">
			{{ Form::open(['route' => ['jobs.destroy', $job['job_id']], 'method' => 'delete']) }}
			@if(in_array('edit', $permittedAction))
			<a href="{{ URL::route('jobs.edit', $job['job_id']) }}" class="btn btn-info">
				<i class="fa fa-pencil"></i>
				Update Information
			</a>
			@endif
			@if(in_array('delete', $permittedAction))
			<button type="submit" class="btn btn-danger">
		 		<i class="fa fa-trash-o"> Delete Job</i>
			</button>
			@endif
		{{ Form::close() }}
		</div>
	</div>
	<div class="row" style="margin-top:10px;">
		<div class="col-md-12">
			<div class="panel panel-primary panel-square panel-no-border">
			  <div class="panel-heading">
					<h3 class="panel-title">Job Details</h3>
			  </div>
			  <div class="panel-body">
				<table class="table table-striped">
					<tbody><tr>
						<td><strong>Job Name</strong></td>
						<td>{{ $job['job_name'] }}</td>
					</tr>
					<tr>
						<td><strong>Job Description</strong></td>
						<td>{{ $job['job_description'] }}</td>
					</tr>
					<tr>
						<td><strong>Department</strong></td>
						<td>{{ $job->department->department_name }}</td>
					</tr>
					<tr>
						<td><strong>Date Created</strong></td>
						<td>{{ date('F j, Y h:i:s A',strtotime($job['created_at'])) }}</td>
					</tr>
					<tr>
						<td><strong>Date Updated</strong></td>
						<td>{{ date('F j, Y h:i:s A',strtotime($job['updated_at'])) }}</td>
					</tr>
				</tbody></table>
			  </div><!-- /.panel-body -->
			</div>
		</div>
	</div>
@stop
