
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