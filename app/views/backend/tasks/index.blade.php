@extends('backend.layouts.master')
@section('site_title')
List of Tasks Page
@stop
@section('content')
	<!-- Begin page heading -->
	<h1 class="page-heading">List of Tasks <small>Displays all the list of tasks registered in the system</small></h1>
	<!-- End page heading -->

	<!-- Begin breadcrumb -->
	<ol class="breadcrumb default square rsaquo sm">
		<li><a href="{{ URL::route('app.dashboard') }}"><i class="fa fa-home"></i></a></li>
		<li class="active">List of Tasks</li>
	</ol>
	<!-- End breadcrumb -->

	@include('notification')
	<div class="row" style="margin-bottom:10px;">
		<div class="col-md-12">
			<a href="{{ URL::route('tasks.create') }}" class="btn btn-info">
			<i class="fa fa-plus"></i>
				Add new task
			</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-danger panel-square panel-no-border">
			  <div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-tasks"></i> Today's task</h3>
				</div>
			  <div class="panel-body">
					@if(count($listOfTodayTasks) > 0)
						@foreach($listOfTodayTasks as $task)
							<div class="col-md-6">
								<div class="the-box">
									<div class="media user-card-sm">
									  <a class="pull-left" href="#fakelink">

									  </a>
									  <div class="media-body">
										<h4 class="media-heading">{{ $task['task_name'] }}</h4>
										<p class="text-info">{{ $task['task_due_date_human'] }}</p>
									  </div>
									  <div class="right-button">
										<div class="btn-group">
											<a href="" data-task-id="{{$task['task_id']}}" class="btn btn-primary task-done"><i class="fa fa-check"></i></a>
											<a href="{{ URL::route('tasks.edit', $task['task_id']) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
											<a href="" data-task-id="{{$task['task_id']}}" class="btn btn-danger task-remove"><i class="fa fa-times"></i></a>
										</div>
									  </div><!-- /.right-button -->
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
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-success panel-square panel-no-border">
			  <div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-calendar"></i> Upcoming task</h3>
				</div>
				<div class="panel-body">
					@if(count($listOfUpcomingTasks) > 0)
						@foreach($listOfUpcomingTasks as $task)
							<div class="col-md-6">
								<div class="the-box">
									<div class="media user-card-sm">
									  <a class="pull-left" href="#fakelink">

									  </a>
									  <div class="media-body">
										<h4 class="media-heading">{{ $task['task_name'] }}</h4>
										<p class="text-info">{{ $task['task_due_date_human'] }}</p>
									  </div>
									  <div class="right-button">
										<div class="btn-group">
											<a data-task-id="{{$task['task_id']}}" class="btn btn-primary task-done"><i class="fa fa-check"></i></a>
											<a href="{{ URL::route('tasks.edit', $task['task_id']) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
											<a  data-task-id="{{$task['task_id']}}" class="btn btn-danger task-remove"><i class="fa fa-times"></i></a>
										</div>
									  </div><!-- /.right-button -->
									</div>
								</div>
							</div>
						@endforeach
						<div class="row">
							<div class="col-md-12 text-center">
								{{ $listOfUpcomingTasks->links() }}
							</div>
						</div>
					@else
						<div class="alert alert-info square fade in alert-dismissable" style="margin-top:10px;">
						  <strong>Information!</strong> You don't have any upcoming tasks in the system.
						</div>
					@endif
				</div><!-- /.panel-body -->
			</div>
		</div>
	</div>
@stop

@section('footer_script')
	<script>
		$(document).ready(function(){
			$('.task-remove').click(function(){
				var task   = $(this);
				$.post('{{ URL::route("tasks.remove") }}',{ 'task_id' : task.attr('data-task-id') },function(){
					task.closest('.col-md-6').hide('slow',function(){
       			task.closest('.col-md-6').remove();
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
					task.closest('.col-md-6').hide('slow',function(){
       			task.closest('.col-md-6').remove();
       		});
				});

				return false;
			});
		});
	</script>
@stop