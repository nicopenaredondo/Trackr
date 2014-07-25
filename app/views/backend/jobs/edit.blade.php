@extends('backend.layouts.master')
@section('site_title')
Edit Job Page
@stop
@section('content')
	<!-- Begin page heading -->
	<h1 class="page-heading">Edit Job Page <small>Displays a form to edit job</small></h1>
	<!-- End page heading -->

	<!-- Begin breadcrumb -->
	<ol class="breadcrumb default square rsaquo sm">
		<li><a href="{{ URL::route('app.dashboard') }}"><i class="fa fa-home"></i></a></li>
		<li><a href="{{ URL::route('jobs.index') }}">List of Job</a></li>
		<li><a href="{{ URL::route('jobs.show', $job['job_id']) }}">{{ $job['job_name'] }}</a></li>
		<li class="active">Edit job information</li>
	</ol>
	<!-- End breadcrumb -->

	<div class="row">
		<div class="col-md-12">
			<div class="the-box">
				<h3 class="small-title">Job Information</h3>
				<hr>
				{{ Form::open(['method' => 'PUT' ,'route' => ['jobs.update',$job['job_id']], 'class' => 'form-horizontal bootstrap-validator-form', 'id' => 'jobRegistrationForm']) }}
					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">Job Name</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="job_name" value="{{ $job['job_name'] }}" placeholder="Enter the job name.." required="" data-bv-notempty-message="The job name is required and cannot be empty" data-bv-field="job_name" data-bv-stringlength="true" data-bv-stringlength-min="2" data-bv-stringlength-max="32" data-bv-stringlength-message="The job name must be more than 2 and less than 32 characters long"><i class="form-control-feedback" data-bv-field="job_name" style="display: none;"></i>
							{{ $errors->first('job_name','<p class="text-danger">:message</p>') }}
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">Job Description </label>
						<div class="col-lg-9">
							<textarea class="form-control" name="job_description" style="resize:none;" placeholder="Enter the job description.." required="" id="" rows="3" data-bv-notempty-message="The job description is required and cannot be empty" data-bv-field="job_description"data-bv-stringlength="true" data-bv-stringlength-max="1000" data-bv-stringlength-message="The job description can only contain 1000 characters">{{ $job['job_description'] }}</textarea>
							{{ $errors->first('job_description','<p class="text-danger">:message</p>') }}
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">Department </label>
						<div class="col-lg-9">
							<select name="department_id" id="" class="form-control" required="" data-bv-notempty-message="The department is required and cannot be empty">
								@foreach($listOfDepartment as $department)
									<option value="{{ $department['department_id'] }}" {{ ($department['department_id'] == $job['department_id']) ? 'selected' : '' }}>{{ $department['department_name'] }} Department</option>
								@endforeach
							</select>
							{{ $errors->first('department_id','<p class="text-danger">:message</p>') }}
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-9 col-lg-offset-3">
							<button type="submit" class="btn btn-primary">Update Information</button>
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
		$('#jobRegistrationForm').bootstrapValidator();
	});
</script>
@stop