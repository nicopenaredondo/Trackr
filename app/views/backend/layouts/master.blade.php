@include('backend._tpl.header')
<!--
===========================================================
BEGIN PAGE
===========================================================
-->
<div class="wrapper">
	@include('backend._tpl.left-sidebar')
	@include('backend._tpl.right-sidebar')
	<div class="page-content">
		<div class="container-fluid">
			@yield('content')
		</div>
		<!-- BEGIN FOOTER -->
		<footer>
			&copy; 2014 <a href="#fakelink">Highly Succeed Incorporated</a><br />
		</footer>
		<!-- END FOOTER -->
	</div>
</div>
@include('backend._tpl.footer')