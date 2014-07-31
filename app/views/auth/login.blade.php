<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login Page | Trackr</title>

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
	{{ HTML::style('assets/css/custom.css') }}

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

	<body class="login tooltips">
	<!--
		===========================================================
		BEGIN PAGE
		===========================================================
		-->
		<div class="login-header text-center">
			<img src="assets/img/logo-login.png" class="logo" alt="Logo">
		</div>
		<div class="login-wrapper">
			{{ Form::open(['route' => 'app.auth.login.process']) }}
				@include('notification')
				<div class="form-group has-feedback lg left-feedback no-label">
				  <input type="text" name="username" class="form-control no-border input-lg rounded" placeholder="Enter username" autofocus>
				  <span class="fa fa-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback lg left-feedback no-label">
				  <input type="password" name="password" class="form-control no-border input-lg rounded" placeholder="Enter password">
				  <span class="fa fa-unlock-alt form-control-feedback"></span>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-lg btn-perspective btn-block">LOGIN</button>
				</div>
			{{ Form::close() }}
		</div><!-- /.login-wrapper -->
		<!--
		===========================================================
		END PAGE
		===========================================================
		-->

		<!--
		===========================================================
		Placed at the end of the document so the pages load faster
		===========================================================
		-->
		<!-- MAIN JAVASRCIPT (REQUIRED ALL PAGE)-->
		{{ HTML::script('assets/js/jquery.min.js') }}
		{{ HTML::script('assets/js/bootstrap.min.js') }}
		{{ HTML::script('assets/plugins/retina/retina.min.js') }}
		{{ HTML::script('assets/plugins/nicescroll/jquery.nicescroll.js') }}
		{{ HTML::script('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}
		{{ HTML::script('assets/plugins/backstretch/jquery.backstretch.min.js') }}

		<!-- PLUGINS -->
		{{ HTML::script('assets/plugins/skycons/skycons.js') }}
		{{ HTML::script('assets/plugins/prettify/prettify.js') }}
		{{ HTML::script('assets/plugins/magnific-popup/jquery.magnific-popup.min.js') }}
		{{ HTML::script('assets/plugins/owl-carousel/owl.carousel.min.js') }}
		{{ HTML::script('assets/plugins/chosen/chosen.jquery.min.js') }}
		{{ HTML::script('assets/plugins/icheck/icheck.min.js') }}
		{{ HTML::script('assets/plugins/datepicker/bootstrap-datepicker.js') }}
		{{ HTML::script('assets/plugins/timepicker/bootstrap-timepicker.js') }}
		{{ HTML::script('assets/plugins/mask/jquery.mask.min.js') }}
		{{ HTML::script('assets/plugins/validator/bootstrapValidator.min.js') }}
		{{ HTML::script('assets/plugins/datatable/js/jquery.dataTables.min.js') }}
		{{ HTML::script('assets/plugins/datatable/js/bootstrap.datatable.js') }}
		{{ HTML::script('assets/plugins/summernote/summernote.min.js') }}
		{{ HTML::script('assets/plugins/markdown/markdown.js') }}
		{{ HTML::script('assets/plugins/markdown/to-markdown.js') }}
		{{ HTML::script('assets/plugins/markdown/bootstrap-markdown.js') }}
		{{ HTML::script('assets/plugins/slider/bootstrap-slider.js') }}

		<!-- EASY PIE CHART JS -->
		{{ HTML::script('assets/plugins/easypie-chart/easypiechart.min.js') }}
		{{ HTML::script('assets/plugins/easypie-chart/jquery.easypiechart.min.js') }}

		<!-- KNOB JS -->
		<!--[if IE]>
		{{ HTML::script('assets/plugins/jquery-knob/excanvas.js') }}
		<![endif]-->
		{{ HTML::script('assets/plugins/jquery-knob/jquery.knob.js') }}
		{{ HTML::script('assets/plugins/jquery-knob/knob.js') }}

		<!-- FLOT CHART JS -->
		{{ HTML::script('assets/plugins/flot-chart/jquery.flot.js') }}
		{{ HTML::script('assets/plugins/flot-chart/jquery.flot.tooltip.js') }}
		{{ HTML::script('assets/plugins/flot-chart/jquery.flot.resize.js') }}
		{{ HTML::script('assets/plugins/flot-chart/jquery.flot.selection.js') }}
		{{ HTML::script('assets/plugins/flot-chart/jquery.flot.stack.js') }}
		{{ HTML::script('assets/plugins/flot-chart/jquery.flot.time.js') }}

		<!-- MORRIS JS -->
		{{ HTML::script('assets/plugins/morris-chart/raphael.min.js') }}
		{{ HTML::script('assets/plugins/morris-chart/morris.min.js') }}

		<!-- C3 JS -->
		{{ HTML::script('assets/plugins/c3-chart/d3.v3.min.js" charset="utf-8') }}
		{{ HTML::script('assets/plugins/c3-chart/c3.min.js') }}

		<!-- MAIN APPS JS -->
		{{ HTML::script('assets/js/apps.js') }}

		<!-- PLUGINS SCRIPTS-->
		@yield('footer_script')

	</body>

</html>