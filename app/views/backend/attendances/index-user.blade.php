@extends('backend.layouts.master')
@section('site_title')
List of Attendance Page
@stop
@section('content')
	<!-- Begin page heading -->
	<h1 class="page-heading">List of Attendance <small>Displays all the list of attendance registered in the system</small></h1>
	<!-- End page heading -->

	<!-- Begin breadcrumb -->
	<ol class="breadcrumb default square rsaquo sm">
		<li><a href="{{ URL::route('app.dashboard') }}"><i class="fa fa-home"></i></a></li>
		<li class="active">List of Attendance</li>
	</ol>
	<!-- End breadcrumb -->

	@include('notification')


	@if(count($listOfAttendances) > 0)
	<div class="row">
		<div class="col-md-12 pull-right">
			<p class="pull-right">
				<a href="{{ URL::route('attendances.attendance-report') }}" class="btn btn-success"><i class="fa fa-eye"></i> View Attendance Report</a>
			</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<ul class="timeline">

				<!-- BEGIN CENTERING LINE -->
				<li class="centering-line"></li>
				<!-- END CENTERING LINE -->

				<li class="item-timeline post-form-timeline">
					<div class="buletan"></div>
					<div class="inner-content">
						@if($isLogin == true)
							@if($isLogout == false)
								{{ Form::open(['route' => 'attendances.store']) }}
								<p>
								<textarea name="remarks" id="remarksEditor" class="form-control" placeholder="Write something..."></textarea>
								</p>
								<p class="text-right">
									<button type="submit" class="btn btn-primary btn-sm">Logout</button>
								</p>
							@else
							<div class="alert alert-info square fade in alert-dismissable" style="margin-top:10px;">
							  <strong>Information!</strong> You already have an attendance for this day.
							</div>
							@endif
						@else
							{{ Form::open(['route' => 'attendances.store']) }}
							<p class="text-center">
								<button type="submit"  class="btn btn-lg btn-primary">Login</button>
							</p>
						@endif
						{{ Form::close() }}
					</div>
				</li>

				@foreach($listOfAttendances as $attendance)
				<!-- BEGIN ITEM TIMELINE -->
				<li class="item-timeline">
					<div class="buletan"></div>
					<div class="inner-content">
						<!-- BEGIN HEADING TIMELINE -->
						<div class="heading-timeline">
							<h1 style="font-size:45px"><i class="fa fa-calendar avatar"></i></h1>
							<div class="user-timeline-info">
								<p>
									{{ $attendance['time_in'].' to '. (is_null($attendance['time_out']) ? $attendance['status'] : $attendance['time_out']) }}
									<small>Total Hours : {{ $attendance['total_hours'] }} </small>
									{{ $attendance['first_name'].' '.$attendance['last_name'] }}
								</p>

							</div><!-- /.user-timeline-info -->
						</div><!-- /.heading-timeline -->
						<!-- END HEADING TIMELINE -->
						<p>
							{{ $attendance['remarks'] }}
						</p>

						<!-- END FOOTER TIMELINE -->
					</div><!-- /.inner-content -->
				</li>
				<!-- END ITEM TIMELINE -->
				@endforeach
			</ul>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 text-center">
			{{ $listOfAttendances->links() }}
		</div>
	</div>
	@else
	<div class="row">
		<div class="col-md-12">
			<ul class="timeline">
				<!-- BEGIN CENTERING LINE -->
				<li class="centering-line"></li>
				<!-- END CENTERING LINE -->

				<li class="item-timeline highlight">
					<div class="buletan"></div>
					<div class="inner-content">
						{{ Form::open(['route' => 'attendances.store']) }}
							<button type="submit"  class="btn btn-block btn-primary">Login</button>
						{{ Form::close() }}
					</div>
				</li>

			</ul>
		</div>
	</div>
	@endif
@stop

@section('footer_script')
	<script>
		$(document).ready(function(){
			$('#remarksEditor').summernote({
				height  : 100,
				toolbar : [
					['style', ['bold', 'italic', 'underline', 'clear']],
					['font', ['strike']],
					['fontsize', ['fontsize']],
					['color', ['color']],
					['para', ['ul', 'ol', 'paragraph']]
				]
			});
		});
	</script>
@stop