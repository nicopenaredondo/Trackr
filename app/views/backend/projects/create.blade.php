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
							<input type="text" class="form-control" name="project_name" value="{{ Input::old('project_name') }}" placeholder="Enter the project name.." required="" data-bv-notempty-message="The project name is required and cannot be empty" data-bv-field="project_name"><i class="form-control-feedback" data-bv-field="firstName" style="display: none;"></i>
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">Contact Person</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="project_contact_person" value="{{ Input::old('project_contact_person') }}" placeholder="Enter the last name.." required="" data-bv-notempty-message="The contact person is required and cannot be empty" data-bv-field="project_contact_person"><i class="form-control-feedback" data-bv-field="lastName" style="display: none;"></i>
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">Contact Number</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="project_contact_number" value="{{ Input::old('project_contact_number') }}"  placeholder="Enter the contact number.." required=""  data-bv-notempty-message="The contact number is required and cannot be empty" data-bv-field="project_contact_number">
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">Email address</label>
						<div class="col-lg-9">
							<input class="form-control" name="email_address" value="{{ Input::old('email_address') }}"  placeholder="Enter the email address.." type="email" required="" data-bv-emailaddress-message="The input is not a valid email address" data-bv-field="email_address"><i class="form-control-feedback" data-bv-field="email_address" style="display: none;"></i>
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">Date Initiated</label>
						<div class="col-lg-9">
							<input type="text" class="form-control date_mask" name="date_initiated" value="{{ Input::old('date_initiated') }}"  placeholder="YYYY-MM-DD" required="" data-bv-date="false" data-bv-date-format="YYYY-MM-DD" data-bv-date-message="The date initiated is not valid" data-bv-field="date_initiated"><i class="form-control-feedback" data-bv-field="date_initiated" style="display: none;"></i>
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">Date Ended</label>
						<div class="col-lg-9">
							<input type="text" class="form-control date_mask" name="date_ended" value="{{ Input::old('date_ended') }}" placeholder="YYYY-MM-DD" required="" data-bv-date="false" data-bv-date-format="YYYY/MM/DD" data-bv-date-message="The date ended is not valid" data-bv-field="date_ended"><i class="form-control-feedback" data-bv-field="date_ended" style="display: none;"></i>
						</div>
					</div>


					<h3 class="small-title">Assign Users</h3>
					<hr>
					@foreach(array_chunk($listOfDepartments, 3) as $rowDepartments)
					<div class="row">
						@foreach($rowDepartments as $department)
						<div class="col-sm-6 col-md-4">
							<!-- BEGIN TASK LIST -->
							<div class="panel panel-success panel-no-border task-list-wrap">
							  <div class="panel-heading">
								<h3 class="panel-title"><i class="fa fa-users"></i> {{ $department['department_name'] }} Department</h3>
							  </div>
							  @foreach($department['jobs'] as $job)
							  <table class="table table-condensed">
							  	<thead>
							  		<th colspan="2"> {{ $job['job_name'] }}</th>
							  	</thead>
							  	<tbody>
							  		@foreach($job['user_profile'] as $user)
							  		<tr>
							  			<td class="text-center">
							  				<input type="checkbox" id="task-{{ $user['user_id'] }}" name="users[]" value="{{ $user['user_id'] }}">
											</td>
											<td>
												<label for="task-{{ $user['user_id'] }}" class="text-muted">
													{{ $user['first_name'].' '.$user['last_name'] }}
												</label>
											</td>
							  		</tr>
							  		@endforeach
							  	</tbody>
							  </table>
							  @endforeach
							</div><!-- /.panel panel-success -->
							<!-- END TASK LIST -->
						</div>
						@endforeach
					</div>
					@endforeach
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
		$('.date_mask').mask('0000-00-00');
	});
</script>
@stop