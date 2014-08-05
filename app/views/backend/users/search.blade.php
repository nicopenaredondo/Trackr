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
	@if(in_array('add', $permittedAction))
	<div class="row" style="margin-bottom:10px;">
		<div class="col-md-12">
			<a href="{{ URL::route('users.create') }}" class="btn btn-info">
			<i class="fa fa-plus"></i>
				Add new user
			</a>
		</div>
	</div>
	@endif
	{{ Form::open(['route' => 'users.index', 'method' => 'GET']) }}
	<div class="row" style="margin-bottom:10px;">
		<div class="col-md-12">
			<div class="input-group custom-search-form">
		    <input type="text" class="form-control" name="query" placeholder="Search user's name.." value="{{ Input::get('query') }}">
		    <span class="input-group-btn">
		      <button class="btn btn-primary" type="submit">
			      <span class="glyphicon glyphicon-search"></span>
			    </button>
		    </span>
		 	</div>
		</div>
	</div>
	{{ Form::close() }}
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-warning fade in alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				There are <strong>{{ count($listOfUsers) }}</strong> results for <i>"{{ Input::get('query') }}" keyword</i>
			</div>
		</div>
	</div>
	@if(count($listOfUsers) > 0)
	@foreach(array_chunk($listOfUsers, 2) as $row)
	<div class="row">
		@foreach($row as $user)
		<div class="col-md-6">
			<div class="the-box no-border">
				<div class="media user-card-sm">
				  <a class="pull-left" href="#fakelink">
					<img class="media-object img-circle" src="assets/img/avatar/avatar-7.jpg" alt="Avatar">
				  </a>
				  <div class="media-body">
					<h4 class="media-heading">{{ $user['first_name'] .' '. $user['last_name'] }}</h4>
					<p class="text-muted">{{ date('F j, Y',strtotime($user['created_at'])) }}</p>
				  </div>
				  <div class="right-button">
						<a href="{{ URL::route('users.show', $user['user_id']) }}" class="btn btn-primary btn-xs"><i class="fa fa-user"></i> View Profile</a>
				  </div><!-- /.right-button -->
				</div>
			</div>
		</div>
		@endforeach
	</div>
	@endforeach
	@endif
@stop