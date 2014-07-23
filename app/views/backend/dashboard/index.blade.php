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
			<div class="col-sm-3">
				<div class="the-box no-border bg-success tiles-information">
					<i class="fa fa-users icon-bg"></i>
					<div class="tiles-inner text-center">
						<p>Online Users</p>
						<h1 class="bolded">14</h1>
						<div class="progress no-rounded progress-xs">
						  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
						  </div><!-- /.progress-bar .progress-bar-success -->
						</div><!-- /.progress .no-rounded -->
					</div><!-- /.tiles-inner -->
				</div><!-- /.the-box no-border -->
			</div><!-- /.col-sm-3 -->
			<div class="col-sm-3">
				<div class="the-box no-border bg-primary tiles-information">
					<i class="fa fa-shopping-cart icon-bg"></i>
					<div class="tiles-inner text-center">
						<p>Total Projects</p>
						<h1 class="bolded">21</h1>
						<div class="progress no-rounded progress-xs">
						  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
						  </div><!-- /.progress-bar .progress-bar-primary -->
						</div><!-- /.progress .no-rounded -->
					</div><!-- /.tiles-inner -->
				</div><!-- /.the-box no-border -->
			</div><!-- /.col-sm-3 -->
			<div class="col-sm-3">
				<div class="the-box no-border bg-danger tiles-information">
					<i class="fa fa-comments icon-bg"></i>
					<div class="tiles-inner text-center">
						<p>Total Departments</p>
						<h1 class="bolded">4</h1>
						<div class="progress no-rounded progress-xs">
						  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
						  </div><!-- /.progress-bar .progress-bar-danger -->
						</div><!-- /.progress .no-rounded -->
					</div><!-- /.tiles-inner -->
				</div><!-- /.the-box no-border -->
			</div><!-- /.col-sm-3 -->
			<div class="col-sm-3">
				<div class="the-box no-border bg-warning tiles-information">
					<i class="fa fa-money icon-bg"></i>
					<div class="tiles-inner text-center">
						<p>Total Users</p>
						<h1 class="bolded">241</h1>
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
			<div class="col-md-12">
				<nav class="navbar square navbar-info" role="navigation">
				  <div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <a class="navbar-brand" href="#fakelink">Announcements</a>
					</div>

					</div><!-- /.container-fluid -->
				</nav>
				<table class="table table-th-block table-success">
					<thead>
						<tr>
							<th style="width: 30px;">No</th>
							<th>Title</th>
							<th>Description</th>
							<th>Date Posted</th>
							<th>Actions</th>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Paris Hawker</td>
							<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi possimus doloremque, </td>
							<td>August 17, 1990</td>
							<td><a href="" class="btn btn-primary">View Announcement</a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<nav class="navbar square navbar-info" role="navigation">
				  <div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
						  <a class="navbar-brand" href="#fakelink">Projects</a>
						</div>
					</div><!-- /.container-fluid -->
				</nav>
				<table class="table table-th-block table-success">
					<thead>
						<tr>
							<th style="width: 30px;">No</th>
							<th>Title</th>
							<th>Contact Person</th>
							<th>Number</th>
							<th>Actions</th>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Project # 1</td>
							<td>JC Dela Cruz </td>
							<td>09264746458</td>
							<td><a href="" class="btn btn-primary">View Project</a></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-md-6">
				<nav class="navbar square navbar-info" role="navigation">
				  <div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
						  <a class="navbar-brand" href="#fakelink">Departments</a>
						</div>
					</div><!-- /.container-fluid -->
				</nav>
				<table class="table table-th-block table-success">
					<thead>
						<tr>
							<th style="width: 30px;">No</th>
							<th>Name</th>
							<th>Department Head</th>
							<th>Actions</th>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Project # 1</td>
							<td>JC Dela Cruz </td>
							<td><a href="" class="btn btn-primary">View Department</a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

@stop