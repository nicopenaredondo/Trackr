@extends('backend.layouts.master')
@section('site_title')
List of Announcements Page
@stop
@section('content')
	<!-- Begin page heading -->
	<h1 class="page-heading">List of Announcements <small>Displays all the list of announcements registered in the system</small></h1>
	<!-- End page heading -->

	<!-- Begin breadcrumb -->
	<ol class="breadcrumb default square rsaquo sm">
		<li><a href="{{ URL::route('app.dashboard') }}"><i class="fa fa-home"></i></a></li>
		<li class="active">List of Announcements</li>
	</ol>
	<!-- End breadcrumb -->

	<div class="row">
		<div class="col-md-12">
			<a href="{{ URL::route('users.create') }}" class="btn btn-info">
			<i class="fa fa-plus"></i>
				Add new announcement
			</a>
		</div>
	</div>
	<div class="row" style="margin-top:10px;">
		<div class="col-sm-4">
			<!-- BEGIN STATIC IMAGE POST -->
			<div class="featured-post-wide">
				<img src="assets/img/photo/medium/img-1.jpg" class="featured-img" alt="Image">
				<div class="featured-text relative">
					<h3><a href="#fakelink">Static image post, check this out</a></h3>
					<p class="date">2 hours ago</p>
					<p>
					Suscipit lobortis nisl ut aliquip ex ea commodo consequat.
					</p>
					<p class="additional-post-wrap">
						<span class="additional-post"><i class="fa fa-user"></i>by <a href="#fakelink">Admin</a></span>
						<span class="additional-post"><i class="fa fa-clock-o"></i><a href="#fakelink">April 20</a></span>
					</p>
					<hr>
					<p class="text-right"><button class="btn btn-success">Read more</button></p>
				</div><!-- /.featured-text -->
			</div><!-- /.featured-post-wide -->
			<!-- END STATIC IMAGE POST -->
		</div><!-- /.col-sm-4 -->

		<div class="col-sm-4">
			<!-- BEGIN STATIC IMAGE POST -->
			<div class="featured-post-wide">
				<img src="assets/img/photo/medium/img-1.jpg" class="featured-img" alt="Image">
				<div class="featured-text relative">
					<h3><a href="#fakelink">Static image post, check this out</a></h3>
					<p class="date">2 hours ago</p>
					<p>
					Suscipit lobortis nisl ut aliquip ex ea commodo consequat.
					</p>
					<p class="additional-post-wrap">
						<span class="additional-post"><i class="fa fa-user"></i>by <a href="#fakelink">Admin</a></span>
						<span class="additional-post"><i class="fa fa-clock-o"></i><a href="#fakelink">April 20</a></span>
					</p>
					<hr>
					<p class="text-right"><button class="btn btn-success">Read more</button></p>
				</div><!-- /.featured-text -->
			</div><!-- /.featured-post-wide -->
			<!-- END STATIC IMAGE POST -->
		</div><!-- /.col-sm-4 -->

		<div class="col-sm-4">
			<!-- BEGIN STATIC IMAGE POST -->
			<div class="featured-post-wide">
				<img src="assets/img/photo/medium/img-1.jpg" class="featured-img" alt="Image">
				<div class="featured-text relative">
					<h3><a href="#fakelink">Static image post, check this out</a></h3>
					<p class="date">2 hours ago</p>
					<p>
					Suscipit lobortis nisl ut aliquip ex ea commodo consequat.
					</p>
					<p class="additional-post-wrap">
						<span class="additional-post"><i class="fa fa-user"></i>by <a href="#fakelink">Admin</a></span>
						<span class="additional-post"><i class="fa fa-clock-o"></i><a href="#fakelink">April 20</a></span>
					</p>
					<hr>
					<p class="text-right"><button class="btn btn-success">Read more</button></p>
				</div><!-- /.featured-text -->
			</div><!-- /.featured-post-wide -->
			<!-- END STATIC IMAGE POST -->
		</div><!-- /.col-sm-4 -->

	</div>
	<div class="row">
		<div class="col-md-12 text-center">
			<ul class="pagination primary">
			  <li class="disabled"><a href="#fakelink">«</a></li>
			  <li class="disabled"><a href="#fakelink">‹</a></li>
			  <li class="active"><a href="#fakelink">1</a></li>
			  <li><a href="#fakelink">2</a></li>
			  <li><a href="#fakelink">3</a></li>
			  <li><a href="#fakelink">...</a></li>
			  <li><a href="#fakelink">15</a></li>
			  <li><a href="#fakelink">›</a></li>
			  <li><a href="#fakelink">»</a></li>
			</ul>
		</div>
	</div>
@stop