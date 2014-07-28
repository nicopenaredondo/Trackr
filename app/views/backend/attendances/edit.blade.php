@extends('backend.layouts.master')
@section('site_title')
Edit Attendance Page
@stop
@section('content')
	<!-- Begin page heading -->
	<h1 class="page-heading">Edit Attendance Page <small>Displays a form to edit attendance information</small></h1>
	<!-- End page heading -->

	<!-- Begin breadcrumb -->
	<ol class="breadcrumb default square rsaquo sm">
		<li><a href="{{ URL::route('app.dashboard') }}"><i class="fa fa-home"></i></a></li>
		<li><a href="{{ URL::route('attendances.index') }}">List of Attendance</a></li>
		<li><a href="{{ URL::route('attendances.show', $attendance['attendance_id']) }}">Attendance #{{ $attendance['attendance_id'] }}</a></li>
		<li class="active">Edit attendance information</li>
	</ol>
	<!-- End breadcrumb -->

	<div class="row">
		<div class="col-md-12">
			<div class="the-box">
				<h3 class="small-title">Attendance Information</h3>
				<hr>
				{{ Form::open(['method' => 'PUT','route' => ['attendances.update',$attendance['attendance_id']], 'class' => 'form-horizontal bootstrap-validator-form', 'id' => 'userRegistrationForm']) }}
					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">Time In</label>
						<div class="col-lg-9">
							<input type="text" class="form-control attendanace_date_mask" name="time_in" value="{{ date('Y-m-d h:i:s', strtotime($attendance['time_in'])) }}" placeholder="0000/00/00 00:00:00" maxlength="19" required="" data-bv-notempty-message="The department name is required and cannot be empty" data-bv-field="time_in" data-bv-stringlength="true" data-bv-stringlength-max="19" data-bv-stringlength-message="The time in date have only 19 characters in capacity"><i class="form-control-feedback" data-bv-field="time_in" style="display: none;"></i>
							{{ $errors->first('time_in','<p class="text-danger">:message</p>') }}
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">Time Out</label>
						<div class="col-lg-9">
							<input type="text" class="form-control attendanace_date_mask" name="time_out" value="{{ date('Y-m-d h:i:s', strtotime($attendance['time_out'])) }}" placeholder="0000/00/00 00:00:00" maxlength="19" required="" data-bv-notempty-message="The department name is required and cannot be empty" data-bv-field="time_out" data-bv-stringlength="true" data-bv-stringlength-max="19" data-bv-stringlength-message="The time in date have only 19 characters in capacity"><i class="form-control-feedback" data-bv-field="time_out" style="display: none;"></i>
							{{ $errors->first('time_out','<p class="text-danger">:message</p>') }}
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
		$('.attendanace_date_mask').mask('0000-00-00 00:00:00');
	});
</script>
@stop