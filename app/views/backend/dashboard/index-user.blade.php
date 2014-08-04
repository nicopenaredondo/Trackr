@extends('backend.layouts.master')
@section('site_title')
Dashboard
@stop

@section('header_styles')
{{ HTML::style('assets/plugins/full-calendar/fullcalendar.css') }}
@stop

@section('content')
	<!-- Begin page heading -->
	<h1 class="page-heading">Dashboard</h1>
	<!-- End page heading -->

		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="panel panel-success panel-square panel-no-border">
				  <div class="panel-heading">
						<h3 class="panel-title"><i class="fa fa-calendar"></i> Calendar</h3>

				  </div>
				  <div class="panel-body">
						<div class="row">
							<div class="col-md-4">
								<div class="panel panel-danger panel-square panel-no-border">
								  <div class="panel-heading">
										<h3 class="panel-title"><i class="fa fa-tasks"></i> Today's task</h3>
									</div>
								  <div class="panel-body">
										@if(count($listOfTodayTasks) > 0)
											@foreach($listOfTodayTasks as $task)
												<div class="row task">
													<div class="col-md-12">
														<div class="the-box">
															<div class="media user-card-sm">
															  <div class="row">
															  	<div class="col-md-12">
															  		<div class="media-body text-center">
																			<h4 class="media-heading">{{ $task['task_name'] }}</h4>
																			<p class="text-info">{{ $task['task_due_date_human'] }}</p>
																	  </div>
															  	</div>
															  </div>
															  <div class="row">
															  	<div class="col-md-12 text-center">
															  		<div class="btn-group">
																			<a href="" data-task-id="{{$task['task_id']}}" class="btn btn-primary task-done"><i class="fa fa-check"></i></a>
																			<a href="{{ URL::route('tasks.edit', $task['task_id']) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
																			<a href="" data-task-id="{{$task['task_id']}}" class="btn btn-danger task-remove"><i class="fa fa-times"></i></a>
																		</div>
															  	</div>
															  </div>
															</div>
														</div>
													</div>
												</div>
											@endforeach
										@else
											<div class="alert alert-info square fade in alert-dismissable" style="margin-top:10px;">
											  <strong>Hooray!</strong> You don't have any task for today
											</div>
										@endif
									</div><!-- /.panel-body -->
								</div>
							</div>
							<div class="col-md-8">
								<div id="calendar"></div>
							</div>
						</div>
					</div><!-- /.panel-body -->
				</div>
			</div>
		</div>
@stop

@section('footer_script')
{{ HTML::script('assets/plugins/full-calendar/lib/moment.min.js') }}
{{ HTML::script('assets/plugins/full-calendar/fullcalendar.js') }}
<script>
	$(document).ready(function() {

	    // page is now ready, initialize the calendar...

	    $('#calendar').fullCalendar({
	        // put your options and callbacks here
	        events: {{ $listOfTasks }}
	    });

	    $('.task-remove').click(function(){
				var task   = $(this);
				$.post('{{ URL::route("tasks.remove") }}',{ 'task_id' : task.attr('data-task-id') },function(){
					task.closest('.task').hide('slow',function(){
       			task.closest('.task').remove();
       		});
				});

				return false;
			});

			$('.task-done').click(function(){
				var task   = $(this);
				var data   = {
					'task_id' : task.attr('data-task-id')
				};
				$.post('{{ URL::route("tasks.change-status") }}', data,function(){
					task.closest('.task').hide('slow',function(){
       			task.closest('.task').remove();
       		});
				});

				return false;
			});

	});

</script>
@stop