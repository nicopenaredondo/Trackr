@extends('backend.layouts.master')
@section('site_title')
Add Department Page
@stop
@section('content')
	<!-- Begin page heading -->
	<h1 class="page-heading">Add Department Page <small>Displays a form to add a new department</small></h1>
	<!-- End page heading -->

	<!-- Begin breadcrumb -->
	<ol class="breadcrumb default square rsaquo sm">
		<li><a href="{{ URL::route('app.dashboard') }}"><i class="fa fa-home"></i></a></li>
		<li><a href="{{ URL::route('departments.index') }}">List of Department</a></li>
		<li class="active">Add new department</li>
	</ol>
	<!-- End breadcrumb -->

	<div class="row">
		<div class="col-md-12">
			<div class="the-box">
				<h3 class="small-title">Department Information</h3>
				<hr>
				{{ Form::open(['route' => 'departments.store', 'class' => 'form-horizontal bootstrap-validator-form', 'id' => 'userRegistrationForm']) }}
					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">Department Name</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="department_name" value="{{ Input::old('department_name') }}" placeholder="Enter the department name.." required="" data-bv-notempty-message="The department name is required and cannot be empty" data-bv-field="department_name" data-bv-stringlength="true" data-bv-stringlength-min="2" data-bv-stringlength-max="32" data-bv-stringlength-message="The department name must be more than 2 and less than 32 characters long"><i class="form-control-feedback" data-bv-field="department_name" style="display: none;"></i>
							{{ $errors->first('department_name','<p class="text-danger">:message</p>') }}
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">Department Description </label>
						<div class="col-lg-9">
							<textarea class="form-control" name="department_description" style="resize:none;" placeholder="Enter the department description.." required="" id="" rows="3" data-bv-notempty-message="The department description is required and cannot be empty" data-bv-field="department_description"data-bv-stringlength="true" data-bv-stringlength-max="1000" data-bv-stringlength-message="The department name can only contain 1000 characters">{{ Input::old('department_description') }}</textarea>
							{{ $errors->first('department_description','<p class="text-danger">:message</p>') }}
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
	});
</script>
@stop