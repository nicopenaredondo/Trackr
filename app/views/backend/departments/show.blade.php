@extends('backend.layouts.master')
@section('site_title')
Department Details Page
@stop
@section('content')
	<!-- Begin page heading -->
	<h1 class="page-heading">Department Details Page <small>Displays the department details</small></h1>
	<!-- End page heading -->

	<!-- Begin breadcrumb -->
	<ol class="breadcrumb default square rsaquo sm">
		<li><a href="{{ URL::route('app.dashboard') }}"><i class="fa fa-home"></i></a></li>
		<li><a href="{{ URL::route('departments.index') }}">List of Department</a></li>
		<li class="active">{{ $department['department_name'] }} </li>
	</ol>
	<!-- End breadcrumb -->

	@include('notification')
	<div class="row">
		<div class="col-md-12">
			{{ Form::open(['route' => ['departments.destroy', $department['department_id']], 'method' => 'delete']) }}
			@if(in_array('edit', $permittedAction))
			<a href="{{ URL::route('departments.edit', $department['department_id']) }}" class="btn btn-info">
				<i class="fa fa-pencil"></i>
				Update Information
			</a>
			@endif
			@if(in_array('delete', $permittedAction))
			<button type="submit" class="btn btn-danger">
		 		<i class="fa fa-trash-o"> Delete Department</i>
			</button>
			@endif
		{{ Form::close() }}
		</div>
	</div>
	<div class="row" style="margin-top:10px;">
		<div class="col-md-12">
			<div class="panel panel-primary panel-square panel-no-border">
			  <div class="panel-heading">
					<h3 class="panel-title">Department Details</h3>
			  </div>
			  <div class="panel-body">
				<table class="table table-striped">
					<tbody><tr>
						<td><strong>Department Name</strong></td>
						<td>{{ $department['department_name'] }}</td>
					</tr>
					<tr>
						<td><strong>Department Description</strong></td>
						<td>{{ $department['department_description'] }}</td>
					</tr>
					<tr>
						<td><strong>Date Created</strong></td>
						<td>{{ date('F j, Y h:i:s A',strtotime($department['created_at'])) }}</td>
					</tr>
					<tr>
						<td><strong>Date Updated</strong></td>
						<td>{{ date('F j, Y h:i:s A',strtotime($department['updated_at'])) }}</td>
					</tr>
				</tbody></table>
			  </div><!-- /.panel-body -->
			</div>
		</div>
	</div>
@stop
