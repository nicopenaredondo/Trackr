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
	<div class="row" style="margin-bottom:10px;">
		<div class="col-md-12">
			<a href="{{ URL::route('users.create') }}" class="btn btn-info">
			<i class="fa fa-plus"></i>
				Add new user
			</a>
		</div>
	</div>
	<div class="row" style="margin-bottom:10px;">
		<div class="col-md-12">
			<div class="input-group custom-search-form">
		    <input type="text" class="form-control" name="query" placeholder="Search user's name.." value="">
		    <span class="input-group-btn">
		      <button class="btn btn-primary" type="submit">
			      <span class="glyphicon glyphicon-search"></span>
			    </button>
		    </span>
		 	</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6 col-md-6">
			<!-- BEGIN TASK LIST -->
			<div class="panel panel-danger panel-no-border task-list-wrap">
			  <div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-users"></i> Administrator</h3>
			  </div>
			  <div class="panel-body">
			  	@if(count($listOfAdministrator) > 0)
				  	@foreach($listOfAdministrator as $administrator)
					  	<div class="the-box no-border">
								<div class="media user-card-sm">
								  <a class="pull-left" href="#fakelink">
									<img class="media-object img-circle" src="assets/img/avatar/avatar-7.jpg" alt="Avatar">
								  </a>
								  <div class="media-body">
									<h4 class="media-heading">{{ $administrator['user_profile']['first_name'] .' '. $administrator['user_profile']['last_name'] }}</h4>
									<p class="text-muted">Date Created: {{ date('F j, Y',strtotime($administrator['created_at'])) }}</p>
								  </div>
								  <div class="right-button">
										<a href="{{ URL::route('users.show', $administrator['user_id']) }}" class="btn btn-primary btn-xs"><i class="fa fa-user"></i> View Profile</a>
								  </div><!-- /.right-button -->
								</div>
							</div>
						@endforeach
					@else
					<div class="alert alert-info square fade in alert-dismissable" style="margin-top:10px;">
					  <strong>Information!</strong> You don't have any administrator users in the system.
					</div>
					@endif
			  </div>
			</div><!-- /.panel panel-success -->
			<!-- END TASK LIST -->
		</div>
		<div class="col-sm-6 col-md-6">
			<!-- BEGIN TASK LIST -->
			<div class="panel panel-danger panel-no-border task-list-wrap">
			  <div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-users"></i> Executive</h3>
			  </div>
			  <div class="panel-body">
			  	@if(count($listOfExecutive) > 0)
				  	@foreach($listOfExecutive as $executive)
					  	<div class="the-box no-border">
								<div class="media user-card-sm">
								  <a class="pull-left" href="#fakelink">
									<img class="media-object img-circle" src="assets/img/avatar/avatar-7.jpg" alt="Avatar">
								  </a>
								  <div class="media-body">
									<h4 class="media-heading">{{ $executive['user_profile']['first_name'] .' '. $executive['user_profile']['last_name'] }}</h4>
									<p class="text-muted">Date Created: {{ date('F j, Y',strtotime($executive['created_at'])) }}</p>
								  </div>
								  <div class="right-button">
										<a href="{{ URL::route('users.show', $executive['user_id']) }}" class="btn btn-primary btn-xs"><i class="fa fa-user"></i> View Profile</a>
								  </div><!-- /.right-button -->
								</div>
							</div>
						@endforeach
					@else
					<div class="alert alert-info square fade in alert-dismissable" style="margin-top:10px;">
					  <strong>Information!</strong> You don't have any executive users in the system.
					</div>
					@endif
			  </div>
			</div><!-- /.panel panel-success -->
			<!-- END TASK LIST -->
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6 col-md-6">
			<!-- BEGIN TASK LIST -->
			<div class="panel panel-danger panel-no-border task-list-wrap">
			  <div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-users"></i> Employee</h3>
			  </div>
			  <div class="panel-body">
			  	@if(count($listOfEmployee) > 0)
				  	@foreach($listOfEmployee as $employee)
					  	<div class="the-box no-border">
								<div class="media user-card-sm">
								  <a class="pull-left" href="#fakelink">
									<img class="media-object img-circle" src="assets/img/avatar/avatar-7.jpg" alt="Avatar">
								  </a>
								  <div class="media-body">
									<h4 class="media-heading">{{ $employee['user_profile']['first_name'] .' '. $employee['user_profile']['last_name'] }}</h4>
									<p class="text-muted">Date Created: {{ date('F j, Y',strtotime($employee['created_at'])) }}</p>
								  </div>
								  <div class="right-button">
										<a href="{{ URL::route('users.show', $employee['user_id']) }}" class="btn btn-primary btn-xs"><i class="fa fa-user"></i> View Profile</a>
								  </div><!-- /.right-button -->
								</div>
							</div>
						@endforeach
					@else
					<div class="alert alert-info square fade in alert-dismissable" style="margin-top:10px;">
					  <strong>Information!</strong> You don't have any employee users in the system.
					</div>
					@endif
			  </div>
			</div><!-- /.panel panel-success -->
			<!-- END TASK LIST -->
		</div>
		<div class="col-sm-6 col-md-6">
			<!-- BEGIN TASK LIST -->
			<div class="panel panel-danger panel-no-border task-list-wrap">
			  <div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-users"></i> OJT/Intern</h3>
			  </div>
			  <div class="panel-body">
			  	@if(count($listOfOjtIntern) > 0)
				  	@foreach($listOfOjtIntern as $ojtIntern)
					  	<div class="the-box no-border">
								<div class="media user-card-sm">
								  <a class="pull-left" href="#fakelink">
									<img class="media-object img-circle" src="assets/img/avatar/avatar-7.jpg" alt="Avatar">
								  </a>
								  <div class="media-body">
									<h4 class="media-heading">{{ $ojtIntern['user_profile']['first_name'] .' '. $ojtIntern['user_profile']['last_name'] }}</h4>
									<p class="text-muted">Date Created: {{ date('F j, Y',strtotime($ojtIntern['created_at'])) }}</p>
								  </div>
								  <div class="right-button">
										<a href="{{ URL::route('users.show', $ojtIntern['user_id']) }}" class="btn btn-primary btn-xs"><i class="fa fa-user"></i> View Profile</a>
								  </div><!-- /.right-button -->
								</div>
							</div>
						@endforeach
					@else
					<div class="alert alert-info square fade in alert-dismissable" style="margin-top:10px;">
					  <strong>Information!</strong> You don't have any ojt/intern users in the system.
					</div>
					@endif
			  </div>
			</div><!-- /.panel panel-success -->
			<!-- END TASK LIST -->
		</div>
	</div>
@stop