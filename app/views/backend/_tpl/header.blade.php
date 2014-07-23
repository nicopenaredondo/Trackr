<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>
	@yield('site_title','Default Title')
	 | Trackr</title>

	<!-- BOOTSTRAP CSS (REQUIRED ALL PAGE)-->
	{{ HTML::style('assets/css/bootstrap.min.css') }}

	<!-- PLUGINS CSS -->
	{{ HTML::style('assets/plugins/weather-icon/css/weather-icons.min.css') }}
	{{ HTML::style('assets/plugins/prettify/prettify.min.css') }}
	{{ HTML::style('assets/plugins/magnific-popup/magnific-popup.min.css') }}
	{{ HTML::style('assets/plugins/owl-carousel/owl.carousel.min.css') }}
	{{ HTML::style('assets/plugins/owl-carousel/owl.theme.min.css') }}
	{{ HTML::style('assets/plugins/owl-carousel/owl.transitions.min.css') }}
	{{ HTML::style('assets/plugins/chosen/chosen.min.css') }}
	{{ HTML::style('assets/plugins/icheck/skins/all.css') }}
	{{ HTML::style('assets/plugins/datepicker/datepicker.min.css') }}
	{{ HTML::style('assets/plugins/timepicker/bootstrap-timepicker.min.css') }}
	{{ HTML::style('assets/plugins/validator/bootstrapValidator.min.css') }}
	{{ HTML::style('assets/plugins/summernote/summernote.min.css') }}
	{{ HTML::style('assets/plugins/markdown/bootstrap-markdown.min.css') }}
	{{ HTML::style('assets/plugins/datatable/css/bootstrap.datatable.min.css') }}
	{{ HTML::style('assets/plugins/morris-chart/morris.min.css') }}
	{{ HTML::style('assets/plugins/c3-chart/c3.min.css') }}
	{{ HTML::style('assets/plugins/slider/slider.min.css') }}

	<!-- MAIN CSS (REQUIRED ALL PAGE)-->
	{{ HTML::style('assets/plugins/font-awesome/css/font-awesome.min.css') }}
	{{ HTML::style('assets/css/style.css') }}
	{{ HTML::style('assets/css/style-responsive.css') }}

	<!-- PLUGINS STYLES-->
	@yield('header_styles')
	<!-- PLUGINS SCRIPTS-->
	@yield('header_script')
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body class="tooltips">
	<!-- BEGIN TOP NAV -->
	<div class="top-navbar">
		<div class="top-navbar-inner">

			<!-- Begin Logo brand -->
			<div class="logo-brand">
				<a href="index.html"><img src="{{ asset('assets/img/sentir-logo-primary.png') }}" alt="HS logo"></a>
			</div><!-- /.logo-brand -->
			<!-- End Logo brand -->

			<div class="top-nav-content">

				<!-- Begin button sidebar left toggle -->
				<div class="btn-collapse-sidebar-left">
					<i class="fa fa-long-arrow-right icon-dinamic"></i>
				</div><!-- /.btn-collapse-sidebar-left -->
				<!-- End button sidebar left toggle -->

				<!-- Begin button sidebar right toggle -->
				<!-- <div class="btn-collapse-sidebar-right">
					<i class="fa fa-bullhorn"></i>
				</div> -->
				<!-- /.btn-collapse-sidebar-right -->
				<!-- End button sidebar right toggle -->

				<!-- Begin button nav toggle -->
				<div class="btn-collapse-nav" data-toggle="collapse" data-target="#main-fixed-nav">
					<i class="fa fa-plus icon-plus"></i>
				</div><!-- /.btn-collapse-sidebar-right -->
				<!-- End button nav toggle -->


				<!-- Begin user session nav -->
				<ul class="nav-user navbar-right">
					<li class="dropdown">
					  <a href="#fakelink" class="dropdown-toggle" data-toggle="dropdown">
						<img src="{{ asset('assets/img/avatar/avatar-1.jpg') }}" class="avatar img-circle" alt="Avatar">
						Hi, <strong>JC Dela Cruz</strong>
					  </a>
					  <ul class="dropdown-menu square primary margin-list-rounded with-triangle">
						<li><a href="#fakelink">Account setting</a></li>
						<li><a href="#fakelink">Change password</a></li>
						<li class="divider"></li>
						<li><a href="lock-screen.html">Lock screen</a></li>
						<li><a href="login.html">Log out</a></li>
					  </ul>
					</li>
				</ul>
				<!-- End user session nav -->

				<!-- Begin Collapse menu nav -->
				<div class="collapse navbar-collapse" id="main-fixed-nav">
					<!-- Begin nav search form -->
					<form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search User...">
						</div>
					</form>
				</div><!-- /.navbar-collapse -->
				<!-- End Collapse menu nav -->
			</div><!-- /.top-nav-content -->
		</div><!-- /.top-navbar-inner -->
	</div><!-- /.top-navbar -->
	<!-- END TOP NAV -->
