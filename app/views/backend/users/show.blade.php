@extends('backend.layouts.master')
@section('site_title')
User Information Page
@stop
@section('content')
	<!-- Begin page heading -->
	<h1 class="page-heading">User Information <small>Displays the user information in the system</small></h1>
	<!-- End page heading -->

	<!-- Begin breadcrumb -->
	<ol class="breadcrumb default square rsaquo sm">
		<li><a href="{{ URL::route('app.dashboard') }}"><i class="fa fa-home"></i></a></li>
		<li><a href="{{ URL::route('users.index') }}">List of Users</a></li>
		<li class="active">{{ $userProfile['first_name']. ' '. $userProfile['last_name'] }}</li>
	</ol>
	<!-- End breadcrumb -->

	@include('notification')
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN PROFILE HEADING -->
			<div class="the-box transparent full no-margin profile-heading">
				<img src="{{ asset('assets/img/photo/wide/img-2.jpg') }}" class="bg-cover" alt="Image">
				<img src="{{ asset('assets/img/avatar/avatar-1.jpg') }}" class="avatar" alt="Avatar">
				<div class="profile-info">
					<p class="user-name">{{ $userProfile['first_name']. ' '. $userProfile['last_name'] }}</p>
				<p class="text-muted">Hometown : <label class="text-primary">{{ $userProfile['address'] }}</label></p>
					<p class="text-muted">Work at <label class="text-primary">{{ $userProfile->job->department->department_name }} Department </label></p>
					{{ Form::open(['route' => ['users.destroy', $user['user_id']], 'method' => 'delete']) }}
					<p class="right-button">
						@if(in_array('edit', $permittedAction))
						<a href="{{ URL::route('users.edit', $userProfile['user_id']) }}" class="btn btn-primary btn-sm">
							<i class="fa fa-pencil"></i>
							Edit Profile
						</a>
						@endif
						@if(in_array('delete', $permittedAction))
						<button type="submit" class="btn btn-danger btn-sm">
					 		<i class="fa fa-trash-o"> Delete User</i>
						</button>
						@endif
					</p>
					{{ Form::close() }}
				</div><!-- /.profile-info -->
			</div><!-- /.the-box .transparent .profile-heading -->
			<!-- END PROFILE HEADING -->

			<div class="panel with-nav-tabs panel-primary panel-square panel-no-border">
			  <div class="panel-heading">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#panel-attendance" data-toggle="tab">Attendance</a></li>
					<li><a href="#panel-profile" data-toggle="tab">Profile</a></li>
				</ul>
			  </div>
				<div id="panel-collapse-1" class="collapse in">
					<div class="panel-body">
						<div class="tab-content">
							<div class="tab-pane fade in active" id="panel-attendance">
								<div class="row">
									<div class="col-md-4">
										<h4 class="small-heading more-margin-bottom">Search Attendance</h4>
										{{ Form::open(['method' => 'GET','route' => ['users.show', $user['user_id']]]) }}
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
										<h4 class="small-heading more-margin-bottom">My Attendance</h4>
										@if(count($listOfAttendances) > 0)
											<table class="table table-hover table-striped">
												<thead>
													<tr>
														<th>Time In</th>
														<th>Time Out</th>
														<th>Total Hours</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
													@foreach($listOfAttendances as $attendance)
													<tr>
														<td>{{ $attendance['time_in'] }}</td>
														<td>{{ $attendance['time_out'] }}</td>
														<td>{{ $attendance['total_hours'] }}</td>
														<td>{{ $attendance['status']  }}</td>
													</tr>
													@endforeach
												</tbody>
											</table>

											<div class="row">
												<div class="col-md-12 text-center">
													{{ $listOfAttendances->links() }}
												</div>
											</div>
										@else
											<div class="alert alert-info square fade in alert-dismissable" style="margin-top:10px;">
											  <strong>Information!</strong> You don't have any attendance records in the system.
											</div>
										@endif
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="panel-profile">
								<h4 class="small-heading more-margin-bottom">Profile Information</h4>
								<form class="form-horizontal" role="form">
									<div class="form-group">
										<label class="col-sm-3 control-label">Full name</label>
										<div class="col-sm-9">
										  <p class="form-control-static">{{ $userProfile['first_name']. ' '. $userProfile['last_name'] }}</p>
										</div>
									</div><!-- /.form-group -->
									<div class="form-group">
										<label class="col-sm-3 control-label">Birthday</label>
										<div class="col-sm-9">
										  <p class="form-control-static">{{ date('F j, Y', strtotime($userProfile['birthday'])) }}</p>
										</div>
									</div><!-- /.form-group -->
									<div class="form-group">
										<label class="col-sm-3 control-label">Address</label>
										<div class="col-sm-9">
										  <p class="form-control-static">{{ $userProfile['address'] }}</p>
										</div>
									</div><!-- /.form-group -->
									<div class="form-group">
										<label class="col-sm-3 control-label">Email</label>
										<div class="col-sm-9">
										  <p class="form-control-static">{{ $userProfile['email'] }}</p>
										</div>
									</div><!-- /.form-group -->
									<div class="form-group">
										<label class="col-sm-3 control-label">Phone Number</label>
										<div class="col-sm-9">
										  <p class="form-control-static">{{ $userProfile['phone_number'] }}</p>
										</div>
									</div><!-- /.form-group -->
									<div class="form-group">
										<label class="col-sm-3 control-label">Emergency Contact Name</label>
										<div class="col-sm-9">
										  <p class="form-control-static">{{ $userProfile['emergency_contact_name'] }}</p>
										</div>
									</div><!-- /.form-group -->
									<div class="form-group">
										<label class="col-sm-3 control-label">Emergency Contact Number</label>
										<div class="col-sm-9">
										  <p class="form-control-static">{{ $userProfile['emergency_contact_number'] }}</p>
										</div>
									</div><!-- /.form-group -->
								</form>
								<h4 class="small-heading more-margin-bottom">Account Information</h4>
								<form class="form-horizontal" role="form">
									<div class="form-group">
										<label class="col-sm-3 control-label">Group Type</label>
										<div class="col-sm-9">
										  <p class="form-control-static">
										  	@if($user['group_id'] == 1)
										  	Administrator
										  	@elseif($user['group_id'] == 2)
										  	Executive
										  	@elseif($user['group_id'] == 3)
										  	Employee
										  	@elseif($user['group_id'] == 4)
										  	OJT/Intern
										  	@endif
										  </p>
										</div>
									</div><!-- /.form-group -->
									<div class="form-group">
										<label class="col-sm-3 control-label">Username</label>
										<div class="col-sm-9">
										  <p class="form-control-static">{{ $user['username'] }}</p>
										</div>
									</div><!-- /.form-group -->
								</form>

								<h4 class="small-heading more-margin-bottom">Company Information</h4>
								<form class="form-horizontal" role="form">
									<div class="form-group">
										<label class="col-sm-3 control-label">Department</label>
										<div class="col-sm-9">
										  <p class="form-control-static">{{ $userProfile->job->department->department_name }}</p>
										</div>
									</div><!-- /.form-group -->
									<div class="form-group">
										<label class="col-sm-3 control-label">Job Designation</label>
										<div class="col-sm-9">
										  <p class="form-control-static">{{ $userProfile->job->job_name }}</p>
										</div>
									</div><!-- /.form-group -->
								</form>

							</div><!-- /#panel-profile -->
						</div><!-- /.tab-content -->
					</div><!-- /.panel-body -->
				</div><!-- /.collapse in -->
			</div><!-- /.panel .panel-success -->

		</div><!-- /.col-md-8 -->
	</div><!-- /.row -->

@stop