@extends('backend.layouts.master')
@section('site_title')
List of User Page
@stop
@section('content')
	<!-- Begin page heading -->
	<h1 class="page-heading">List of Users <small>Displays all the list of users registered in the system</small></h1>
	<!-- End page heading -->

	<!-- Begin breadcrumb -->
	<ol class="breadcrumb default square rsaquo sm">
		<li><a href="{{ URL::route('app.dashboard') }}"><i class="fa fa-home"></i></a></li>
		<li class="active">List of Users</li>
	</ol>
	<!-- End breadcrumb -->

	@include('notification')
	<div class="row">
		<div class="col-md-12">
			<a href="{{ URL::route('users.create') }}" class="btn btn-info">
			<i class="fa fa-plus"></i>
				Add new user
			</a>
		</div>
	</div>
	@if(count($listOfUsers) > 0)
	<div class="row" style="margin-top:10px;">
		@foreach($listOfUsers as $user)
		<div class="col-md-4 col-sm-6">
			<!-- BEGIN USER CARD LONG -->
			<div class="the-box no-border">
				<div class="media user-card-sm">
				  <a class="pull-left" href="#fakelink">
					<img class="media-object img-circle" src="assets/img/avatar/avatar-7.jpg" alt="Avatar">
				  </a>
				  <div class="media-body">
					<h4 class="media-heading">{{ $user['user_profile']['first_name'] .' '. $user['user_profile']['last_name'] }}</h4>
					<p class="text-muted">Project Manager</p>
				  </div>
				  <div class="right-button">
						<a href="{{ URL::route('users.show', $user['user_id']) }}" class="btn btn-primary btn-xs"><i class="fa fa-user"></i> View Profile</a>
				  </div><!-- /.right-button -->
				</div>
			</div><!-- /.the-box .no-border -->
			<!-- BEGIN USER CARD LONG -->
		</div>
		@endforeach
		<div class="col-md-12 text-center">
			<ul class="pagination separated">
			  {{ $listOfUsers->links() }}
			</ul>
		</div>
	</div>
	@else
	<div class="alert alert-info square fade in alert-dismissable" style="margin-top:10px;">
	  <strong>Information!</strong> You don't have any users in the system. Would you like to create
	  <a href="{{ URL::route('users.create') }}" class="alert-link">one </a>?
	</div>
	@endif
@stop