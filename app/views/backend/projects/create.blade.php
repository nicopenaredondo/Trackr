@extends('backend.layouts.master')
@section('site_title')
Add Project Page
@stop
@section('content')
	<!-- Begin page heading -->
	<h1 class="page-heading">Add Project Page <small>Displays a form to add a new project</small></h1>
	<!-- End page heading -->

	<!-- Begin breadcrumb -->
	<ol class="breadcrumb default square rsaquo sm">
		<li><a href="{{ URL::route('app.dashboard') }}"><i class="fa fa-home"></i></a></li>
		<li><a href="{{ URL::route('projects.index') }}">List of Projects</a></li>
		<li class="active">Add new project</li>
	</ol>
	<!-- End breadcrumb -->

	<div class="row">
		<div class="col-md-12">
			{{ Form::open(['route' => 'projects.store', 'class' => 'form-horizontal bootstrap-validator-form', 'id' => 'projectRegistrationForm']) }}
			<div class="the-box">
				<h3 class="small-title">Project Information</h3>
				<hr>
					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">Project Name</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="projectName" placeholder="Enter the project name.." required="" data-bv-notempty-message="The project name is required and cannot be empty" data-bv-field="projectName"><i class="form-control-feedback" data-bv-field="firstName" style="display: none;"></i>
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">Contact Person</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="contactPerson" placeholder="Enter the last name.." required="" data-bv-notempty-message="The contact person is required and cannot be empty" data-bv-field="contactPerson"><i class="form-control-feedback" data-bv-field="lastName" style="display: none;"></i>
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">Contact Number</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="contact_number" placeholder="Enter the contact number.." required=""  data-bv-notempty-message="The contact number is required and cannot be empty" data-bv-field="contact_number">
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">Email address</label>
						<div class="col-lg-9">
							<input class="form-control" name="email" placeholder="Enter the email address.." type="email" required="" data-bv-emailaddress-message="The input is not a valid email address" data-bv-field="email"><i class="form-control-feedback" data-bv-field="email" style="display: none;"></i>
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">Date Started</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="dateStarted" placeholder="Choose date started.." required="" data-bv-date="false" data-bv-date-format="YYYY/MM/DD" data-bv-date-message="The date started is not valid" data-bv-field="dateStarted"><i class="form-control-feedback" data-bv-field="dateStarted" style="display: none;"></i>
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">Date Ended</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="dateEnded" placeholder="Choose date ended.." required="" data-bv-date="false" data-bv-date-format="YYYY/MM/DD" data-bv-date-message="The date ended is not valid" data-bv-field="dateEnded"><i class="form-control-feedback" data-bv-field="dateEnded" style="display: none;"></i>
						</div>
					</div>


					<h3 class="small-title">Assign Users</h3>
					<hr>

					<div class="row">
						<div class="col-sm-6 col-md-4">
							<!-- BEGIN TASK LIST -->
							<div class="panel panel-success panel-no-border task-list-wrap">
							  <div class="panel-heading">
								<h3 class="panel-title"><i class="fa fa-users"></i> Web Department</h3>
							  </div>
								<ul class="list-group">
								  <li class="list-group-item">
										<div class="checkbox">
												<input type="checkbox" id="task-1" name="users[]" value="1">
												<label for="task-1">Eating woods</label>
										</div><!-- /.checkbox -->
								  </li>
								</ul>
							</div><!-- /.panel panel-success -->
							<!-- END TASK LIST -->
						</div>
						<div class="col-sm-6 col-md-4">
							<!-- BEGIN TASK LIST -->
							<div class="panel panel-success panel-no-border task-list-wrap">
							  <div class="panel-heading">
								<h3 class="panel-title"><i class="fa fa-users"></i> Mobile Department</h3>
							  </div>
								<ul class="list-group">
								  <li class="list-group-item">
										<div class="checkbox">
												<input type="checkbox" id="task-2" name="users[]" value="1">
												<label for="task-2">Eating woods</label>
										</div><!-- /.checkbox -->
								  </li>
								</ul>
							</div><!-- /.panel panel-success -->
							<!-- END TASK LIST -->
						</div>
						<div class="col-sm-6 col-md-4">
							<!-- BEGIN TASK LIST -->
							<div class="panel panel-success panel-no-border task-list-wrap">
							  <div class="panel-heading">
								<h3 class="panel-title"><i class="fa fa-users"></i> Systems Department</h3>
							  </div>
								<ul class="list-group">
								  <li class="list-group-item">
										<div class="checkbox">
												<input type="checkbox" id="task-3" name="users[]" value="1">
												<label for="task-3">Eating woods</label>
										</div><!-- /.checkbox -->
								  </li>
								</ul>
							</div><!-- /.panel panel-success -->
							<!-- END TASK LIST -->
						</div>
					</div>
			</div>
			<button type="submit" class="btn btn-primary btn-block btn-lg btn-square">Submit Information</button>
			{{ Form::close() }}
		</div>
	</div>
@stop

@section('footer_script')
<script>
	$(document).ready(function(){
		$('#projectRegistrationForm').bootstrapValidator();
	});
</script>
@stop