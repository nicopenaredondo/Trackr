@extends('backend.layouts.master')
@section('site_title')
Edit User Page
@stop
@section('content')
	<!-- Begin page heading -->
	<h1 class="page-heading">Edit User Page <small>Displays a form to edit user</small></h1>
	<!-- End page heading -->

	<!-- Begin breadcrumb -->
	<ol class="breadcrumb default square rsaquo sm">
		<li><a href="{{ URL::route('app.dashboard') }}"><i class="fa fa-home"></i></a></li>
		<li><a href="{{ URL::route('users.index') }}">List of Users</a></li>
		<li><a href="{{ URL::route('users.show', $user['user_id']) }}"> {{ $userProfile['first_name']. ' '. $userProfile['last_name'] }} </a></li>
		<li class="active">Edit user information</li>
	</ol>
	<!-- End breadcrumb -->

	@include('notification')
	<div class="row">
		<div class="col-md-12">
			<div class="the-box">
				<h3 class="small-title">Basic Information</h3>
				<hr>
				{{ Form::open(['method' => 'PUT', 'route' => ['users.update', $user['user_id']], 'class' => 'form-horizontal bootstrap-validator-form', 'id' => 'userRegistrationForm']) }}
					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">First Name</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="first_name" value="{{ $userProfile['first_name'] }}" placeholder="Enter the first name.." required="" data-bv-notempty-message="The first name is required and cannot be empty" data-bv-field="first_name"><i class="form-control-feedback" data-bv-field="first_name" style="display: none;"></i>
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">Last Name</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="last_name" value="{{ $userProfile['last_name'] }}" placeholder="Enter the last name.." required="" data-bv-notempty-message="The last name is required and cannot be empty" data-bv-field="last_name"><i class="form-control-feedback" data-bv-field="last_name" style="display: none;"></i>
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">Birthday</label>
						<div class="col-lg-9">
							<input type="text" class="form-control date_mask" name="birthday" value="{{ $userProfile['birthday'] }}" placeholder="YYYY-MM-DD" required="" data-bv-notempty-message="The birthday is required and cannot be empty" data-bv-date="true" data-date-format="yyyy-mm-dd" data-bv-date-format="YYYY-MM-DD" data-bv-date-message="The birthday is not valid" data-bv-field="birthday"><i class="form-control-feedback" data-bv-field="birthday" style="display: none;"></i>
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">Address </label>
						<div class="col-lg-9">
							<textarea class="form-control" name="address" style="resize:none;" placeholder="Enter the address.." required="" id="" rows="3" data-bv-notempty-message="The address is required and cannot be empty" data-bv-field="address">{{ $userProfile['address'] }}</textarea>
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">Email address</label>
						<div class="col-lg-9">
							<input class="form-control" name="email" value="{{ $userProfile['email'] }}" placeholder="Enter the email address.." type="email" required="" data-bv-notempty-message="The email is required and cannot be empty" data-bv-emailaddress-message="The input is not a valid email address" data-bv-field="email"><i class="form-control-feedback" data-bv-field="email" style="display: none;"></i>
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">Phone Number</label>
						<div class="col-lg-9">
							<input class="form-control" name="phone_number" value="{{ $userProfile['phone_number'] }}" placeholder="Enter the phone number.." type="text" required="" data-bv-notempty-message="The phone number is required and cannot be empty" data-bv-field="phone_number"><i class="form-control-feedback" data-bv-field="phone_number" style="display: none;"></i>
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">Emergency Contact Number</label>
						<div class="col-lg-9">
							<input class="form-control" name="emergency_contact_number" value="{{ $userProfile['emergency_contact_number'] }}" placeholder="Enter the emergency contact number.." type="text" required="" data-bv-notempty-message="The emergency contact number is required and cannot be empty" data-bv-field="emergency_contact_number"><i class="form-control-feedback" data-bv-field="emergency_contact_number" style="display: none;"></i>
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">Emergency Contact Name</label>
						<div class="col-lg-9">
							<input class="form-control" name="emergency_contact_name" value="{{ $userProfile['emergency_contact_name'] }}" placeholder="Enter the emergency contact name.." type="text" required="" data-bv-notempty-message="The emergency contact name is required and cannot be empty" data-bv-field="emergency_contact_name"><i class="form-control-feedback" data-bv-field="emergency_contact_name" style="display: none;"></i>
						</div>
					</div>

					<h3 class="small-title">Account Information</h3>
					<hr>

					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">Group Type</label>
						<div class="col-lg-9">
							<select name="group_id" class="form-control chosen-select" required="" data-bv-notempty-message="The group type is required and cannot be empty">
								<option value="1" {{ ($user['group_id'] == 1) ? 'selected' : '' }}>Administrator</option>
								<option value="2" {{ ($user['group_id'] == 2) ? 'selected' : '' }}>Executive</option>
								<option value="3" {{ ($user['group_id'] == 3) ? 'selected' : '' }}>Employee</option>
								<option value="4" {{ ($user['group_id'] == 4) ? 'selected' : '' }}>OJT/Intern</option>
							</select>
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">Username</label>
						<div class="col-lg-9">
							<p class="form-control-static">{{ $user['username'] }}</p>
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">Password</label>
						<div class="col-lg-9">
							<a href="{{ URL::route('users.reset-password', $user['user_id']) }}" class="btn btn-xs btn-danger"><i class="fa fa-repeat"></i>Reset Password</a>
						</div>
					</div>

					<h3 class="small-title">Company Information</h3>
					<hr>

					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">Job Position</label>
						<div class="col-lg-9">
							<select name="job_id" class="form-control chosen-select" required="" data-bv-notempty-message="The job position is required and cannot be empty">
								@foreach($listOfDepartments as $department)
									<optgroup label="{{ $department['department_name'] }} Department">
										@foreach($department['jobs'] as $job)
										<option value="{{ $job['job_id'] }}" {{ ($job['job_id'] == $userProfile['job_id']) ? 'selected' : '' }}>{{ $job['job_name'] }}</option>
										@endforeach
									</optgroup>
								@endforeach
							</select>
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-9 col-lg-offset-3">
							<button type="submit" class="btn btn-primary">Submit Information</button>
						</div>
					</div>

				{{ Form::close() }}
			</div>
		</div>
	</div>
@stop

@section('footer_script')
<script>
	$(document).ready(function(){
		$('#userRegistrationForm').bootstrapValidator();
		$('.date_mask').mask('0000-00-00');
	});
</script>
@stop