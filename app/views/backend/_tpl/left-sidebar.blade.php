<!-- BEGIN SIDEBAR LEFT -->
<div class="sidebar-left sidebar-nicescroller">
	<ul class="sidebar-menu">
		<li class="static">Navigation</li>
		@foreach($left_sidebar_menu as $menu)
			{{ HTML::activeLink($menu['url'], $menu['name'], $menu['machine_name'], $menu['icon']) }}
		@endforeach
	</ul>
</div><!-- /.sidebar-left -->
<!-- END SIDEBAR LEFT -->