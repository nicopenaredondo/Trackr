@extends('backend.layouts.master')
@section('site_title')
Announcement Details Page
@stop
@section('content')
	<!-- Begin page heading -->
	<h1 class="page-heading">Announcement Details Page <small>Displays the announcement details</small></h1>
	<!-- End page heading -->

	<!-- Begin breadcrumb -->
	<ol class="breadcrumb default square rsaquo sm">
		<li><a href="{{ URL::route('app.dashboard') }}"><i class="fa fa-home"></i></a></li>
		<li><a href="{{ URL::route('announcements.index') }}">List of Announcement</a></li>
		<li class="active">{{ $announcement['announcement_title'] }} </li>
	</ol>
	<!-- End breadcrumb -->

	@include('notification')
	<div class="row">
		<div class="col-md-12">
			{{ Form::open(['route' => ['announcements.destroy', $announcement['announcement_id']], 'method' => 'delete']) }}
			@if(in_array('edit', $permittedAction))
			<a href="{{ URL::route('announcements.edit', $announcement['announcement_id']) }}" class="btn btn-info">
				<i class="fa fa-pencil"></i>
				Update Information
			</a>
			@endif
			@if(in_array('delete', $permittedAction))
			<button type="submit" class="btn btn-danger">
		 		<i class="fa fa-trash-o"> Delete Announcement</i>
			</button>
			@endif
		{{ Form::close() }}
		</div>
	</div>
	<div class="row" style="margin-top:10px;">
		<div class="col-md-12">
			<div class="panel panel-primary panel-square panel-no-border">
			  <div class="panel-heading">
					<h3 class="panel-title">Announcement Details</h3>
			  </div>
			  <div class="panel-body">
				<table class="table table-striped">
					<tbody><tr>
						<td width="15%"><strong>Announcement Title</strong></td>
						<td width="85%">{{ $announcement['announcement_title'] }}</td>
					</tr>
					<tr>
						<td><strong>Announcement Body</strong></td>
						<td>{{ $announcement['announcement_body'] }}</td>
					</tr>
					<tr>
						<td><strong>Date Created</strong></td>
						<td>{{ date('F j, Y h:i:s A',strtotime($announcement['created_at'])) }}</td>
					</tr>
					<tr>
						<td><strong>Date Updated</strong></td>
						<td>{{ date('F j, Y h:i:s A',strtotime($announcement['updated_at'])) }}</td>
					</tr>
				</tbody></table>
			  </div><!-- /.panel-body -->
			</div>
		</div>
	</div>
@stop
