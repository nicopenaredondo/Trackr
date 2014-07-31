@extends('backend.layouts.master')
@section('site_title')
Dashboard
@stop
@section('content')
	<!-- Begin page heading -->
	<h1 class="page-heading">Dashboard</h1>
	<!-- End page heading -->

		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="panel panel-success panel-square panel-no-border">
				  <div class="panel-heading">
						<h3 class="panel-title">Announcements</h3>
						<div class="right-content">
							<a href="{{ URL::route('announcements.index') }}" class="btn btn-xs btn-success">
								<i class="fa fa-list"></i> View All Announcements
							</a>
						</div>
				  </div>
				  <div class="panel-body">
				  @if(count($listOfAnnouncement) > 0)
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Title</th>
								<th>Posted At</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($listOfAnnouncement as $announcement)
							<tr>
								<td>{{ Str::limit($announcement['announcement_title'],30) }}</td>
								<td>{{ date('F j, Y', strtotime($announcement['created_at']))  }}</td>
								<th>
									<a href="{{ URL::route('announcements.show', $announcement['announcement_id']) }}" class="btn btn-default btn-xs"><i class="fa fa-eye"></i> View Announcement</a>
								</th>
							</tr>
							@endforeach
						</tbody>
					</table>
					@else
						<div class="alert alert-info square fade in alert-dismissable" style="margin-top:10px;">
						  <strong>Information!</strong> You don't have any announcements in the system.
						</div>
					@endif
					</div><!-- /.panel-body -->
				</div>
			</div>
		</div>
@stop