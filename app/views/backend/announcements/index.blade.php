@extends('backend.layouts.master')
@section('site_title')
List of Announcements Page
@stop
@section('content')
	<!-- Begin page heading -->
	<h1 class="page-heading">List of Announcements <small>Displays all the list of announcements registered in the system</small></h1>
	<!-- End page heading -->

	<!-- Begin breadcrumb -->
	<ol class="breadcrumb default square rsaquo sm">
		<li><a href="{{ URL::route('app.dashboard') }}"><i class="fa fa-home"></i></a></li>
		<li class="active">List of Announcements</li>
	</ol>
	<!-- End breadcrumb -->

	@include('notification')
	@if(in_array('add', $permittedAction))
	<div class="row">
		<div class="col-md-12">
			<a href="{{ URL::route('announcements.create') }}" class="btn btn-info">
			<i class="fa fa-plus"></i>
				Add new announcement
			</a>
		</div>
	</div>
	@endif
	@if(count($listOfAnnouncements) > 0)
	<div class="row" style="margin-top:10px;">
		<div class="col-md-12">
			<table class="table table-condensed table-striped">
				<thead>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Short Description</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($listOfAnnouncements as $announcement)
					<tr>
						<td>{{ $announcement['announcement_id'] }}</td>
						<td>{{ $announcement['announcement_title'] }}</td>
						<td>{{ Str::limit(strip_tags($announcement['announcement_body']),100) }}</td>
						<td><a href="{{ URL::route('announcements.show', $announcement['announcement_id']) }}" class="btn btn-xs btn-success"><i class="fa fa-eye"></i> View Announcement</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 text-center">
			{{ $listOfAnnouncements->links() }}
		</div>
	</div>
	@else
		<div class="alert alert-info square fade in alert-dismissable" style="margin-top:10px;">
		  <strong>Information!</strong> You don't have any announcements in the system.
		</div>
	@endif
@stop