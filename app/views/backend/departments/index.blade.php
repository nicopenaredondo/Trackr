@extends('backend.layouts.master')
@section('site_title')
List of Departments Page
@stop
@section('content')
	<!-- Begin page heading -->
	<h1 class="page-heading">List of Departments <small>Displays all the list of departments registered in the system</small></h1>
	<!-- End page heading -->

	<!-- Begin breadcrumb -->
	<ol class="breadcrumb default square rsaquo sm">
		<li><a href="{{ URL::route('app.dashboard') }}"><i class="fa fa-home"></i></a></li>
		<li class="active">List of Departments</li>
	</ol>
	<!-- End breadcrumb -->

	@include('notification')
	@if(in_array('add', $permittedAction))
	<div class="row" style="margin-top:10px;">
		<div class="col-md-12">
			<a href="{{ URL::route('departments.create') }}" class="btn btn-info">
			<i class="fa fa-plus"></i>
				Add new department
			</a>
		</div>
	</div>
	@endif
	@if(count($listOfDepartments) > 0)
	<div class="row" style="margin-top:10px;">
		<div class="col-md-12">
			<table class="table table-condensed table-striped">
				<thead>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Description</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($listOfDepartments as $department)
					<tr>
						<td>{{ $department['department_id'] }}</td>
						<td>{{ $department['department_name'] }}</td>
						<td>{{ $department['department_description'] }}</td>
						<td><a href="{{ URL::route('departments.show', $department['department_id']) }}" class="btn btn-xs btn-success"><i class="fa fa-eye"></i> View Department</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 text-center">
			{{ $listOfDepartments->links() }}
		</div>
	</div>
	@else
		<div class="alert alert-info square fade in alert-dismissable" style="margin-top:10px;">
		  <strong>Information!</strong> You don't have any departments in the system.
		</div>
	@endif
@stop