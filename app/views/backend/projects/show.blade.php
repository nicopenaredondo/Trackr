@extends('backend.layouts.master')
@section('site_title')
Project Details Page
@stop
@section('content')
	<!-- Begin page heading -->
	<h1 class="page-heading">Project Details Page <small>Displays the project details</small></h1>
	<!-- End page heading -->

	<!-- Begin breadcrumb -->
	<ol class="breadcrumb default square rsaquo sm">
		<li><a href="{{ URL::route('app.dashboard') }}"><i class="fa fa-home"></i></a></li>
		<li><a href="{{ URL::route('projects.index') }}">List of Projects</a></li>
		<li class="active">{{ $project['project_name'] }}</li>
	</ol>
	<!-- End breadcrumb -->
	@include('notification')
	<div class="row">
		<div class="col-md-12">
			{{ Form::open(['route' => ['projects.destroy', $project['project_id']], 'method' => 'delete']) }}
			@if(in_array('edit', $permittedAction))
			<a href="{{ URL::route('projects.edit', $project['project_id']) }}" class="btn btn-info">
				<i class="fa fa-pencil"></i>
				Update Information
			</a>
			@endif
			@if(in_array('delete', $permittedAction))
			<button type="submit" class="btn btn-danger">
		 		<i class="fa fa-trash-o"> Delete Project</i>
			</button>
			@endif
		{{ Form::close() }}
		</div>
	</div>
	<div class="row" style="margin-top:10px;">
		<div class="col-md-12">
			<div class="panel panel-primary panel-square panel-no-border">
			  <div class="panel-heading">
					<h3 class="panel-title">Overview</h3>
			  </div>
			  <div class="panel-body">
				<table class="table table-striped">
					<tr>
						<td><strong>Contact Person</strong></td>
						<td>{{ $project['project_contact_person'] }}</td>
					</tr>
					<tr>
						<td><strong>Contact Number</strong></td>
						<td>{{ $project['project_contact_number'] }}</td>
					</tr>
					<tr>
						<td><strong>Email Address</strong></td>
						<td>{{ $project['email_address'] }}</td>
					</tr>
					<tr>
						<td><strong>Status</strong></td>
						<td><span class="label label-warning">{{ $project['project_status'] }}</span></td>
					</tr>
					<tr>
						<td><strong>Date Initiated</strong></td>
						<td>{{ date('F j, Y',strtotime($project['date_initiated'])) }}</td>
					</tr>
					<tr>
						<td><strong>Due Date</strong></td>
						<td>{{ date('F j, Y',strtotime($project['date_ended'])) }}</td>
					</tr>
				</table>
			  </div><!-- /.panel-body -->
			</div>
			<!-- BEGIN TEAM LIST -->
			<div class="panel panel-primary panel-square panel-no-border">
			  <div class="panel-heading">
				<!-- <div class="right-content">
					<button class="btn btn-primary btn-sm to-collapse" data-toggle="collapse" data-target="#panel-collapse-4"><i class="fa fa-chevron-up"></i></button>
				</div> -->
				<h4 class="panel-title">Assigned Users</h4>
			  </div>
				<div id="panel-collapse-4" class="collapse in">
				  <div class="panel-body">
				  @if(count($users) > 0)
				  <ul class="media-list media-sm media-team">
						@foreach($users as $user)
						  <li class="media">
							<a class="pull-left" href="#fakelink">
							  <img class="media-object img-circle" src="{{ asset('assets/img/avatar/avatar-1.jpg') }}" alt="Avatar">
							</a>
							<div class="media-body">
							  <h4 class="media-heading">{{ $user['first_name'].' '.$user['last_name'] }}</h4>
							  <p class="text-danger">{{ $user->job->job_name }}</p>
							</div>
						  </li>
						@endforeach
					</ul>
					@if(in_array('edit', $permittedAction))
						<a href="{{ URL::route('projects.edit', $project['project_id']) }}" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Add User</a>
					@endif
					@else
					<div class="alert alert-info square fade in alert-dismissable" style="margin-top:10px;">
					  <strong>Information!</strong> This project doesn't have any assigned users.
					</div>
					@endif
				  </div><!-- /.panel-body -->
				</div><!-- /.collapse in -->
			</div><!-- /.panel panel-default -->
			<!-- END TEAM LIST -->
		</div>
	</div>

@stop

