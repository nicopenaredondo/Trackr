<!-- BEGIN SIDEBAR LEFT -->
<div class="sidebar-left sidebar-nicescroller">
	<ul class="sidebar-menu">
		<li class="static">Navigation</li>
		{{ HTML::activeLink(URL::route('app.dashboard'), 'Dashboard', '' , 'fa-home icon-sidebar') }}
		{{ HTML::activeLink(URL::route('users.index'), 'Users', 'users' , 'fa-users icon-sidebar') }}
		{{ HTML::activeLink(URL::route('projects.index'), 'Projects', 'projects' , 'fa-list icon-sidebar') }}
		{{ HTML::activeLink(URL::route('announcements.index'), 'Announcements', 'announcements' , 'fa-bullhorn icon-sidebar') }}
		<li>
			<a href="#fakelink">
				<i class="fa fa-calendar icon-sidebar"></i>
				<i class="fa chevron-icon-sidebar"></i>
				Attendances
			</a>
		</li>
		<li>
			<a href="#fakelink">
				<i class="fa fa-building icon-sidebar"></i>
				<i class="fa chevron-icon-sidebar"></i>
				Departments
			</a>
		</li>
		<li>
			<a href="#fakelink">
				<i class="fa fa-cogs icon-sidebar"></i>
				<i class="fa chevron-icon-sidebar"></i>
				Settings
			</a>
		</li>
	</ul>
</div><!-- /.sidebar-left -->
<!-- END SIDEBAR LEFT -->