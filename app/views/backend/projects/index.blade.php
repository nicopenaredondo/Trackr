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

	@include('notification')
	@if(in_array('add', $permittedAction))
	<div class="row" style="margin-top:10px;">
		<div class="col-md-12">
			<a href="{{ URL::route('projects.create') }}" class="btn btn-info">
			<i class="fa fa-plus"></i>
				Add new project
			</a>
		</div>
	</div>
	@endif
	@if(count($listOfProjects) > 0)
	<div class="row" style="margin-top:10px;">
		@foreach($listOfProjects as $project)
		<div class="col-md-4">
			<!-- BEGIN PROFILE CARD  -->
			<div class="the-box  full card-info">
				<div class="the-box  text-center no-margin">
					<!-- /.right-action -->
					<h4 class="bolded text-danger">{{ $project['project_name'] }}</h4>
					<p><span class="label label-warning">{{ $project['project_status'] }}</span></p>

					<div class="row">
						<div class="col-xs-6">
							<h4 class="bolded">{{ date('F j, Y',strtotime($project['date_initiated'])) }}</h4>
							<p class="text-muted">Date Initiated</p>
						</div><!-- /.col-xs-4 -->
						<div class="col-xs-6">
							<h4 class="bolded">{{ date('F j, Y',strtotime($project['date_ended'])) }}</h4>
							<p class="text-muted">Due Date</p>
						</div><!-- /.col-xs-4 -->
						<!-- /.col-xs-4 -->
					</div>
				</div><!-- /.the-box .no-border .bg-info .no-margin -->
				<a href="{{ URL::route('projects.show', $project['project_id']) }}" class="btn btn-primary btn-block btn-lg btn-square">View Project</a>
			</div><!-- /.the-box -->
			<!-- END PROFILE CARD  -->
		</div>
		@endforeach
		<div class="row">
			<div class="col-md-12 text-center">
				{{ $listOfProjects->links() }}
			</div>
		</div>
	</div>
	@else
		<div class="alert alert-info square fade in alert-dismissable" style="margin-top:10px;">
		  <strong>Information!</strong> You don't have any projects in the system
		</div>
	@endif
@stop