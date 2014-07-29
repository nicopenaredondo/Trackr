@extends('backend.layouts.master')
@section('site_title')
Add Announcement Page
@stop

@section('header_script')
{{ HTML::script('//cdn.ckeditor.com/4.4.1/basic/ckeditor.js') }}
@stop

@section('content')
	<!-- Begin page heading -->
	<h1 class="page-heading">Add Announcement Page <small>Displays a form to add a new announcement</small></h1>
	<!-- End page heading -->

	<!-- Begin breadcrumb -->
	<ol class="breadcrumb default square rsaquo sm">
		<li><a href="{{ URL::route('app.dashboard') }}"><i class="fa fa-home"></i></a></li>
		<li><a href="{{ URL::route('departments.index') }}">List of Announcement</a></li>
		<li class="active">Add new announcement</li>
	</ol>
	<!-- End breadcrumb -->

	<div class="row">
		<div class="col-md-12">
			<div class="the-box">
				<h3 class="small-title">Announcement Information</h3>
				<hr>
				{{ Form::open(['route' => 'announcements.store', 'class' => 'form-horizontal bootstrap-validator-form', 'id' => 'userRegistrationForm']) }}
					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">Announcement Title</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="announcement_title" value="{{ Input::old('announcement_title') }}" placeholder="Enter the announcement title.." required="" data-bv-notempty-message="The announcement title is required and cannot be empty" data-bv-field="announcement_title" data-bv-stringlength="true" data-bv-stringlength-min="2" data-bv-stringlength-max="32" data-bv-stringlength-message="The announcement title has a capacity of 128 characters long only"><i class="form-control-feedback" data-bv-field="announcement_title" style="display: none;"></i>
							{{ $errors->first('announcement_title','<p class="text-danger">:message</p>') }}
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">Announcement Body </label>
						<div class="col-lg-9">
							<textarea class="form-control" id="announcement_body" name="announcement_body" style="resize:none;" placeholder="Enter the announcement body.." required="" rows="3" data-bv-notempty-message="The announcement body is required and cannot be empty" data-bv-field="announcement_body"data-bv-stringlength="true" data-bv-stringlength-max="1000" data-bv-stringlength-message="The announcement_body can only contain 1000 characters">{{ Input::old('announcement_body') }}</textarea>
							{{ $errors->first('announcement_body','<p class="text-danger">:message</p>') }}
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
	CKEDITOR.replace( 'announcement_body' );
	$(document).ready(function(){
		$('#userRegistrationForm').bootstrapValidator();
	});
</script>
@stop