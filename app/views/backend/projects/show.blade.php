@extends('backend.layouts.master')
@section('site_title')
Project Details Page
@stop
@section('content')
	<!-- Begin page heading -->
	<h1 class="page-heading">Project Details Page <small>Displays a form to add a new project</small></h1>
	<!-- End page heading -->

	<!-- Begin breadcrumb -->
	<ol class="breadcrumb default square rsaquo sm">
		<li><a href="{{ URL::route('app.dashboard') }}"><i class="fa fa-home"></i></a></li>
		<li><a href="{{ URL::route('projects.index') }}">List of Projects</a></li>
		<li class="active">PROJECT NAME HERE</li>
	</ol>
	<!-- End breadcrumb -->

	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-primary panel-square panel-no-border">
			  <div class="panel-heading">
					<h3 class="panel-title">Activities</h3>
			  </div>
			  <div class="panel-body">
					<ul class="media-list media-xs">
					  <li class="media">
							<a class="pull-left" href="#fakelink">
							  <img class="media-object img-circle" src="{{ asset('assets/img/avatar/avatar-1.jpg') }}" alt="Avatar">
							</a>
							<div class="media-body">
							  <h4 class="media-heading"><a href="#fakelink">You</a> wrote <a href="#fakelink">a post</a></h4>
							  <p class="date"><small>2 hours ago</small></p>
							  <p class="small">
							  Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
							  </p>
							</div>
					  </li>
					  <li class="media">
							<a class="pull-left" href="#fakelink">
							  <img class="media-object img-circle" src="{{ asset('assets/img/avatar/avatar-2.jpg') }}" alt="Avatar">
							</a>
							<div class="media-body">
							  <h4 class="media-heading"><a href="#fakelink">Thomas White</a> rate <a href="#fakelink">a story</a></h4>
							  <p class="date"><small>5 hours ago</small></p>
							  <p><strong><a href="#fakelink">Consectetuer adipiscing elit, sed diam nonummy nibh</a></strong></p>
							  <p class="small">
							  Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
							  </p>
							  <p class="text-muted small">By Thomas White</p>
							  <p>
								<i class="fa fa-star text-warning"></i>
								<i class="fa fa-star text-warning"></i>
								<i class="fa fa-star text-warning"></i>
								<i class="fa fa-star text-warning"></i>
								<i class="fa fa-star"></i>
							  </p>
							</div>
					  </li>
					  <li class="media">
							<a class="pull-left" href="#fakelink">
							  <img class="media-object img-circle" src="{{ asset('assets/img/avatar/avatar-3.jpg') }}" alt="Avatar">
							</a>
							<div class="media-body">
							  <h4 class="media-heading"><a href="#fakelink">Doina Slaivici</a> updated <a href="#fakelink">a quote</a></h4>
							  <p class="date"><small>Yesterday</small></p>
							  <blockquote>
							  Wong urip kui mung mampir ngombe dab, rasah kemaki!
							  <small>at <a href="#fakelink">Yogyakarta, Indonesia</a></small>
							  </blockquote>
							</div>
					  </li>
					  <li class="media">
							<a class="pull-left" href="#fakelink">
							  <img class="media-object img-circle" src="{{ asset('assets/img/avatar/avatar-4.jpg') }}" alt="Avatar">
							</a>
							<div class="media-body">
							  <h4 class="media-heading"><a href="#fakelink">Harry Nichols</a> commented <a href="#fakelink">a photo</a></h4>
							  <p class="date"><small>2 hours ago</small></p>
							  <div class="row">
								<div class="col-sm-6">
								<img src="assets/img/photo/medium/img-1.jpg" class="img-responsive thumbnail" alt="Image">
								</div><!-- /.col-sm-6 -->
							  </div><!-- /.row -->
							  <p class="small">
							  Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy!
							  </p>
							</div>
					  </li>
					  <li class="media">
							<a class="pull-left" href="#fakelink">
							  <img class="media-object img-circle" src="{{ asset('assets/img/avatar/avatar-5.jpg') }}" alt="Avatar">
							</a>
							<div class="media-body">
							  <h4 class="media-heading"><a href="#fakelink">Mihaela Cihac</a> added <a href="#fakelink">15 friends</a></h4>
							  <p class="date"><small>May 01, 2014</small></p>
							</div>
					  </li>
					</ul>
			  </div><!-- /.panel-body -->
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-primary panel-square panel-no-border">
			  <div class="panel-heading">
					<h3 class="panel-title">Overview</h3>
			  </div>
			  <div class="panel-body">
				<table class="table table-striped">
					<tr>
						<td><strong>Contact Person</strong></td>
						<td>Kate</td>
					</tr>
					<tr>
						<td><strong>Contact Number</strong></td>
						<td>09245621232</td>
					</tr>
					<tr>
						<td><strong>Email Address</strong></td>
						<td>kate@bistro.com</td>
					</tr>
					<tr>
						<td><strong>Contact Person</strong></td>
						<td>Kate</td>
					</tr>
					<tr>
						<td><strong>Status</strong></td>
						<td><span class="label label-warning">Development</span></td>
					</tr>
					<tr>
						<td><strong>Date Initiated</strong></td>
						<td>January 20,2014 3:00 PM</td>
					</tr>
					<tr>
						<td><strong>Due Date</strong></td>
						<td>January 24,2014 3:00PM</td>
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
					<ul class="media-list media-sm media-team">
					  <li class="media">
						<a class="pull-left" href="#fakelink">
						  <img class="media-object img-circle" src="{{ asset('assets/img/avatar/avatar-1.jpg') }}" alt="Avatar">
						</a>
						<div class="media-body">
						  <h4 class="media-heading">Paris Hawker</h4>
						  <p class="text-danger">Graphic designer</p>
						</div>
					  </li>
					  <li class="media">
						<a class="pull-left" href="#fakelink">
						  <img class="media-object img-circle" src="{{ asset('assets/img/avatar/avatar-2.jpg') }}" alt="Avatar">
						</a>
						<div class="media-body">
						  <h4 class="media-heading">Thomas White</h4>
						  <p class="text-danger">UI / UX designer</p>
						</div>
					  </li>
					  <li class="media">
						<a class="pull-left" href="#fakelink">
						  <img class="media-object img-circle" src="{{ asset('assets/img/avatar/avatar-3.jpg') }}" alt="Avatar">
						</a>
						<div class="media-body">
						  <h4 class="media-heading">Doina Slaivici</h4>
						  <p class="text-danger">Web developer</p>
						</div>
					  </li>
					  <li class="media">
						<a class="pull-left" href="#fakelink">
						  <img class="media-object img-circle" src="{{ asset('assets/img/avatar/avatar-4.jpg') }}" alt="Avatar">
						</a>
						<div class="media-body">
						  <h4 class="media-heading">Harry Nichols</h4>
						  <p class="text-danger">Web designer</p>
						</div>
					  </li>
					  <li class="media">
						<a class="pull-left" href="#fakelink">
						  <img class="media-object img-circle" src="{{ asset('assets/img/avatar/avatar-5.jpg') }}" alt="Avatar">
						</a>
						<div class="media-body">
						  <h4 class="media-heading">Mihaela Cihac</h4>
						  <p class="text-danger">Project manager</p>
						</div>
					  </li>
					</ul>
					<button class="btn btn-primary btn-block"><i class="glyphicon glyphicon-plus"></i> Add User</button>
				  </div><!-- /.panel-body -->
				</div><!-- /.collapse in -->
			</div><!-- /.panel panel-default -->
			<!-- END TEAM LIST -->
		</div>
	</div>

@stop

