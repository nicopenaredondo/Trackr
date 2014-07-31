@extends('backend.layouts.master')
@section('site_title')
Change Password Page
@stop
@section('content')
	<!-- Begin page heading -->
	<h1 class="page-heading">Change Password Page <small>Displays a form to change the current password</small></h1>
	<!-- End page heading -->

	<!-- Begin breadcrumb -->
	<ol class="breadcrumb default square rsaquo sm">
		<li><a href="{{ URL::route('app.dashboard') }}"><i class="fa fa-home"></i></a></li>
		<li class="active">Change password</li>
	</ol>
	<!-- End breadcrumb -->

	@include('notification')
	<div class="row">
		<div class="col-md-12">
			<div class="the-box">
				<h3 class="small-title">Change Password</h3>
				<hr>
				{{ Form::open(['route' => 'app.change-password.process', 'class' => 'form-horizontal bootstrap-validator-form', 'id' => 'userRegistrationForm']) }}
					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">New Password</label>
						<div class="col-lg-9">
							<input type="password" class="form-control" name="password" value="{{ Input::old('password') }}" placeholder="Enter the new password.." required="" >
							{{ $errors->first('password','<p class="text-danger">:message</p>') }}
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