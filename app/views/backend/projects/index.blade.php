@extends('backend.layouts.master')
@section('site_title')
List of Projects Page
@stop
@section('content')
	<!-- Begin page heading -->
	<h1 class="page-heading">List of Projects <small>Displays all the list of projects registered in the system</small></h1>
	<!-- End page heading -->

	<!-- Begin breadcrumb -->
	<ol class="breadcrumb default square rsaquo sm">
		<li><a href="{{ URL::route('app.dashboard') }}"><i class="fa fa-home"></i></a></li>
		<li class="active">List of Projects</li>
	</ol>
	<!-- End breadcrumb -->

	<div class="row">
		<div class="col-md-12">
			<a href="{{ URL::route('projects.create') }}" class="btn btn-info">
			<i class="fa fa-plus"></i>
				Add new project
			</a>
		</div>
	</div>
	<div class="row" style="margin-top:10px;">
		<div class="col-md-4">
			<!-- BEGIN PROFILE CARD  -->
			<div class="the-box  full card-info">
				<div class="the-box  text-center no-margin">
					<!-- /.right-action -->
					<h4 class="bolded text-danger">PLDT Event Management System</h4>
					<p><span class="label label-warning">Development</span></p>

					<div class="row">
						<div class="col-xs-6">
							<h4 class="bolded">2</h4>
							<p class="text-muted">Members</p>
						</div><!-- /.col-xs-4 -->
						<div class="col-xs-6">
							<h4 class="bolded">Jan 26,2014</h4>
							<p class="text-muted">Due Date</p>
						</div><!-- /.col-xs-4 -->
						<!-- /.col-xs-4 -->
					</div>
				</div><!-- /.the-box .no-border .bg-info .no-margin -->
				<a href="{{ URL::route('projects.show',1) }}" class="btn btn-primary btn-block btn-lg btn-square">View Project</a>
			</div><!-- /.the-box -->
			<!-- END PROFILE CARD  -->
		</div>
		<div class="col-md-4">
			<!-- BEGIN PROFILE CARD  -->
			<div class="the-box  full card-info">
				<div class="the-box  text-center no-margin">
					<!-- /.right-action -->
					<h4 class="bolded text-danger">PLDT Event Management System</h4>
					<p><span class="label label-warning">Development</span></p>

					<div class="row">
						<div class="col-xs-6">
							<h4 class="bolded">2</h4>
							<p class="text-muted">Members</p>
						</div><!-- /.col-xs-4 -->
						<div class="col-xs-6">
							<h4 class="bolded">Jan 26,2014</h4>
							<p class="text-muted">Due Date</p>
						</div><!-- /.col-xs-4 -->
						<!-- /.col-xs-4 -->
					</div>
				</div><!-- /.the-box .no-border .bg-info .no-margin -->
				<a href="{{ URL::route('projects.show',1) }}" class="btn btn-primary btn-block btn-lg btn-square">View Project</a>
			</div><!-- /.the-box -->
			<!-- END PROFILE CARD  -->
		</div>
		<div class="col-md-4">
			<!-- BEGIN PROFILE CARD  -->
			<div class="the-box  full card-info">
				<div class="the-box  text-center no-margin">
					<!-- /.right-action -->
					<h4 class="bolded text-danger">PLDT Event Management System</h4>
					<p><span class="label label-warning">Development</span></p>

					<div class="row">
						<div class="col-xs-6">
							<h4 class="bolded">2</h4>
							<p class="text-muted">Members</p>
						</div><!-- /.col-xs-4 -->
						<div class="col-xs-6">
							<h4 class="bolded">Jan 26,2014</h4>
							<p class="text-muted">Due Date</p>
						</div><!-- /.col-xs-4 -->
						<!-- /.col-xs-4 -->
					</div>
				</div><!-- /.the-box .no-border .bg-info .no-margin -->
				<a href="{{ URL::route('projects.show',1) }}" class="btn btn-primary btn-block btn-lg btn-square">View Project</a>
			</div><!-- /.the-box -->
			<!-- END PROFILE CARD  -->
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 text-center">
			<ul class="pagination primary">
			  <li class="disabled"><a href="#fakelink">«</a></li>
			  <li class="disabled"><a href="#fakelink">‹</a></li>
			  <li class="active"><a href="#fakelink">1</a></li>
			  <li><a href="#fakelink">2</a></li>
			  <li><a href="#fakelink">3</a></li>
			  <li><a href="#fakelink">...</a></li>
			  <li><a href="#fakelink">15</a></li>
			  <li><a href="#fakelink">›</a></li>
			  <li><a href="#fakelink">»</a></li>
			</ul>
		</div>
	</div>
@stop