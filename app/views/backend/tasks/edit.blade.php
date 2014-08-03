@extends('backend.layouts.master')
@section('site_title')
Edit Task Page
@stop
@section('content')
	<!-- Begin page heading -->
	<h1 class="page-heading">Edit Task Page <small>Displays a form to edit a task</small></h1>
	<!-- End page heading -->

	<!-- Begin breadcrumb -->
	<ol class="breadcrumb default square rsaquo sm">
		<li><a href="{{ URL::route('app.dashboard') }}"><i class="fa fa-home"></i></a></li>
		<li><a href="{{ URL::route('tasks.index') }}">List of Task</a></li>
		<li class="active">Edit task information</li>
	</ol>
	<!-- End breadcrumb -->

	<div class="row">
		<div class="col-md-12">
			<div class="the-box">
				<h3 class="small-title">Task Information</h3>
				<hr>
				{{ Form::open(['method' => 'PUT','route' => ['tasks.update', $task['task_id']], 'class' => 'form-horizontal bootstrap-validator-form', 'id' => 'userRegistrationForm']) }}
					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">Task Name</label>
						<div class="col-lg-9">
							<input type="text" class="form-control" name="task_name" value="{{ $task['task_name'] }}" placeholder="Enter the task name.." required="" data-bv-notempty-message="The department name is required and cannot be empty" data-bv-field="task_name" data-bv-stringlength="true" data-bv-stringlength-min="2" data-bv-stringlength-max="140" data-bv-stringlength-message="The department name must be more than 2 and less than 140 characters long"><i class="form-control-feedback" data-bv-field="task_name" style="display: none;"></i>
							{{ $errors->first('task_name','<p class="text-danger">:message</p>') }}
						</div>
					</div>

					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">Task Due Date</label>
						<div class="col-lg-9">
  						<input type="text" class="form-control date_mask col-md-4" value="{{ $task['task_due_date'] }}" name="task_due_date" value="{{ Input::old('task_due_date') }}" placeholder="YYYY-MM-DD" required="" data-bv-notempty-message="The task due date is required and cannot be empty" data-bv-date="true" data-date-format="yyyy-mm-dd" data-bv-date-format="YYYY-MM-DD" data-bv-date-message="The task due date is not valid" data-bv-field="task_due_date"><i class="form-control-feedback" data-bv-field="task_due_date" style="display: none;"></i>
							{{ $errors->first('task_due_date','<p class="text-danger">:message</p>') }}
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