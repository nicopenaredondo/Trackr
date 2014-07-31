@extends('backend.layouts.master')
@section('site_title')
Dashboard
@stop
@section('content')
	<!-- Begin page heading -->
	<h1 class="page-heading">Dashboard</h1>
	<!-- End page heading -->

		<!-- BEGIN SiTE INFORMATIONS -->
		<div class="row">
			<div class="col-md-3 col-sm-6">
				<div class="the-box no-border bg-success tiles-information">
					<i class="fa fa-bullhorn icon-bg"></i>
					<div class="tiles-inner text-center">
						<p>Total Announcements</p>
						<h1 class="bolded">{{ $countOfAnnouncement }}</h1>
						<div class="progress no-rounded progress-xs">
						  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
						  </div><!-- /.progress-bar .progress-bar-success -->
						</div><!-- /.progress .no-rounded -->
					</div><!-- /.tiles-inner -->
				</div><!-- /.the-box no-border -->
			</div><!-- /.col-sm-3 -->
			<div class="col-md-3 col-sm-6">
				<div class="the-box no-border bg-primary tiles-information">
					<i class="fa fa-shopping-cart icon-bg"></i>
					<div class="tiles-inner text-center">
						<p>Total Projects</p>
						<h1 class="bolded">{{ $countOfProject }}</h1>
						<div class="progress no-rounded progress-xs">
						  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
						  </div><!-- /.progress-bar .progress-bar-primary -->
						</div><!-- /.progress .no-rounded -->
					</div><!-- /.tiles-inner -->
				</div><!-- /.the-box no-border -->
			</div><!-- /.col-sm-3 -->
			<div class="col-md-3 col-sm-6">
				<div class="the-box no-border bg-danger tiles-information">
					<i class="fa fa-comments icon-bg"></i>
					<div class="tiles-inner text-center">
						<p>Total Departments</p>
						<h1 class="bolded">{{ $countOfDepartment }}</h1>
						<div class="progress no-rounded progress-xs">
						  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
						  </div><!-- /.progress-bar .progress-bar-danger -->
						</div><!-- /.progress .no-rounded -->
					</div><!-- /.tiles-inner -->
				</div><!-- /.the-box no-border -->
			</div><!-- /.col-sm-3 -->
			<div class="col-md-3 col-sm-6">
				<div class="the-box no-border bg-warning tiles-information">
					<i class="fa fa-money icon-bg"></i>
					<div class="tiles-inner text-center">
						<p>Total Users</p>
						<h1 class="bolded">{{ $countOfUser }}</h1>
						<div class="progress no-rounded progress-xs">
						  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
						  </div><!-- /.progress-bar .progress-bar-warning -->
						</div><!-- /.progress .no-rounded -->
					</div><!-- /.tiles-inner -->
				</div><!-- /.the-box no-border -->
			</div><!-- /.col-sm-3 -->
		</div><!-- /.row -->
		<!-- END SITE INFORMATIONS -->

		<div class="row">
			<div class="col-md-6 col-xs-12">
				<div class="panel panel-success panel-square panel-no-border">
				  <div class="panel-heading">
						<h3 class="panel-title">Announcements</h3>
						<div class="right-content">
							<a href="{{ URL::route('announcements.index') }}" class="btn btn-xs btn-success">
								<i class="fa fa-list"></i> View All Announcements
							</a>
						</div>
				  </div>
				  <div class="panel-body">
				  @if(count($listOfAnnouncement) > 0)
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Title</th>
								<th>Posted At</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($listOfAnnouncement as $announcement)
							<tr>
								<td>{{ Str::limit($announcement['announcement_title'],30) }}</td>
								<td>{{ date('F j, Y', strtotime($announcement['created_at']))  }}</td>
								<th>
									<a href="{{ URL::route('announcements.show', $announcement['announcement_id']) }}" class="btn btn-default btn-xs"><i class="fa fa-eye"></i> View Announcement</a>
								</th>
							</tr>
							@endforeach
						</tbody>
					</table>
					@else
						<div class="alert alert-info square fade in alert-dismissable" style="margin-top:10px;">
						  <strong>Information!</strong> You don't have any announcements in the system.
						</div>
					@endif
					</div><!-- /.panel-body -->
				</div>
			</div>
			<div class="col-md-6 col-xs-12">
				<div class="panel panel-primary panel-square panel-no-border">
				  <div class="panel-heading">
						<h3 class="panel-title">Projects</h3>
						<div class="right-content">
							<a href="{{ URL::route('projects.index') }}" class="btn btn-xs btn-primary">
								<i class="fa fa-list"></i> View All Projects
							</a>
						</div>
				  </div>
				  <div class="panel-body">
				  @if(count($listOfProject) > 0)
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Title</th>
								<th>Posted At</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($listOfProject as $project)
							<tr>
								<td>{{ Str::limit($project['project_name'],30) }}</td>
								<td>{{ date('F j, Y', strtotime($project['created_at']))  }}</td>
								<th>
									<a href="{{ URL::route('projects.show', $project['project_id']) }}" class="btn btn-default btn-xs">
										<i class="fa fa-eye"></i> View Project
									</a>
								</th>
							</tr>
							@endforeach
						</tbody>
					</table>
					@else
						<div class="alert alert-info square fade in alert-dismissable" style="margin-top:10px;">
						  <strong>Information!</strong> You don't have any projects in the system.
						</div>
					@endif
					</div><!-- /.panel-body -->
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6 col-xs-12">
				<div class="panel panel-danger panel-square panel-no-border">
				  <div class="panel-heading">
						<h3 class="panel-title">Department</h3>
						<div class="right-content">
							<a href="{{ URL::route('departments.index') }}" class="btn btn-xs btn-danger">
								<i class="fa fa-list"></i> View All Department
							</a>
						</div>
				  </div>
				  <div class="panel-body">
				  @if(count($listOfDepartment) > 0)
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Name</th>
								<th>Posted At</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($listOfDepartment as $department)
							<tr>
								<td>{{ Str::limit($department['department_name'],30) }}</td>
								<td>{{ date('F j, Y', strtotime($department['created_at']))  }}</td>
								<th>
									<a href="{{ URL::route('departments.show', $department['department']) }}" class="btn btn-default btn-xs"><i class="fa fa-eye"></i> View Announcement</a>
								</th>
							</tr>
							@endforeach
						</tbody>
					</table>
					@else
						<div class="alert alert-info square fade in alert-dismissable" style="margin-top:10px;">
						  <strong>Information!</strong> You don't have any departments in the system.
						</div>
					@endif
					</div><!-- /.panel-body -->
				</div>
			</div>
			<div class="col-md-6 col-xs-12">
				<div class="panel panel-warning panel-square panel-no-border">
				  <div class="panel-heading">
						<h3 class="panel-title">Users</h3>
						<div class="right-content">
							<a href="{{ URL::route('projects.index') }}" class="btn btn-xs btn-warning">
								<i class="fa fa-list"></i> View All Users
							</a>
						</div>
				  </div>
				  <div class="panel-body">
				  @if(count($listOfUser) > 0)
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Name</th>
								<th>Designation</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($listOfUser as $user)
							<tr>
								<td>{{ Str::limit($user->userProfile->first_name.' '.$user->userProfile->last_name,30) }}</td>
								<td>{{ $user->userProfile->job->job_name  }}</td>
								<th>
									<a href="{{ URL::route('users.show', $user['user_id']) }}" class="btn btn-default btn-xs">
										<i class="fa fa-eye"></i> View User
									</a>
								</th>
							</tr>
							@endforeach
						</tbody>
					</table>
					@else
						<div class="alert alert-info square fade in alert-dismissable" style="margin-top:10px;">
						  <strong>Information!</strong> You don't have any users in the system.
						</div>
					@endif
					</div><!-- /.panel-body -->
				</div>
			</div>
		</div>

@stop