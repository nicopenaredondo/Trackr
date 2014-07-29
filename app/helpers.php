<?php

function getMenuByGroup($group_id)
{
	$menu = [];
	if ($group_id == 1) {
		# code...
		$menu = [
			[
				'name' 	=> 'Dashboard',
				'machine_name' => 'dashboard',
				'url'  	=> URL::route('app.dashboard'),
				'icon'	=> 'fa-home icon-sidebar'
			],
			[
				'name' 	=> 'Users',
				'machine_name' => 'users',
				'url'  	=> URL::route('users.index'),
				'icon'	=> 'fa-users icon-sidebar'
			],
			[
				'name' 	=> 'Projects',
				'machine_name' => 'projects',
				'url'  	=> URL::route('projects.index'),
				'icon'	=> 'fa-list icon-sidebar'
			],
			[
				'name' 	=> 'Announcements',
				'machine_name' => 'announcements',
				'url'  	=> URL::route('announcements.index'),
				'icon'	=> 'fa-bullhorn icon-sidebar'
			],
			[
				'name' 	=> 'Attendances',
				'machine_name' => 'attendances',
				'url'  	=> URL::route('attendances.index'),
				'icon'	=> 'fa-calendar icon-sidebar'
			],
			[
				'name' 	=> 'Departments',
				'machine_name' => 'departments',
				'url'  	=> URL::route('departments.index'),
				'icon'	=> 'fa-building icon-sidebar'
			],
			[
				'name' 	=> 'Jobs',
				'machine_name' => 'jobs',
				'url'  	=> URL::route('jobs.index'),
				'icon'	=> 'fa-user icon-sidebar'
			],
			[
				'name' 	=> 'Settings',
				'machine_name' => 'settings',
				'url'  	=> URL::route('attendances.index'),
				'icon'	=> 'fa-cogs icon-sidebar'
			]

		];

	}elseif ($group_id == 2) {
		# code...
		$menu = [
			[
				'name' 	=> 'Dashboard',
				'machine_name' => 'dashboard',
				'url'  	=> URL::route('app.dashboard'),
				'icon'	=> 'fa-home icon-sidebar'
			],
			[
				'name' 	=> 'Projects',
				'machine_name' => 'projects',
				'url'  	=> URL::route('projects.index'),
				'icon'	=> 'fa-list icon-sidebar'
			],
			[
				'name' 	=> 'Announcements',
				'machine_name' => 'announcements',
				'url'  	=> URL::route('announcements.index'),
				'icon'	=> 'fa-bullhorn icon-sidebar'
			],
			[
				'name' 	=> 'Attendances',
				'machine_name' => 'attendances',
				'url'  	=> URL::route('attendances.index'),
				'icon'	=> 'fa-calendar icon-sidebar'
			],
		];

	}elseif ($group_id == 3) {
		# code...
		$menu = [
			[
				'name' 	=> 'Dashboard',
				'machine_name' => 'dashboard',
				'url'  	=> URL::route('app.dashboard'),
				'icon'	=> 'fa-home icon-sidebar'
			],
			[
				'name' 	=> 'Projects',
				'machine_name' => 'projects',
				'url'  	=> URL::route('projects.index'),
				'icon'	=> 'fa-list icon-sidebar'
			],
			[
				'name' 	=> 'Announcements',
				'machine_name' => 'announcements',
				'url'  	=> URL::route('announcements.index'),
				'icon'	=> 'fa-bullhorn icon-sidebar'
			],
			[
				'name' 	=> 'Attendances',
				'machine_name' => 'attendances',
				'url'  	=> URL::route('attendances.index'),
				'icon'	=> 'fa-calendar icon-sidebar'
			],
		];

	}elseif ($group_id == 4) {
		# code...
		$menu = [
			[
				'name' 	=> 'Dashboard',
				'machine_name' => 'dashboard',
				'url'  	=> URL::route('app.dashboard'),
				'icon'	=> 'fa-home icon-sidebar'
			],
			[
				'name' 	=> 'Projects',
				'machine_name' => 'projects',
				'url'  	=> URL::route('projects.index'),
				'icon'	=> 'fa-list icon-sidebar'
			],
			[
				'name' 	=> 'Announcements',
				'machine_name' => 'announcements',
				'url'  	=> URL::route('announcements.index'),
				'icon'	=> 'fa-bullhorn icon-sidebar'
			],
			[
				'name' 	=> 'Attendances',
				'machine_name' => 'attendances',
				'url'  	=> URL::route('attendances.index'),
				'icon'	=> 'fa-calendar icon-sidebar'
			],
		];

	}

	return $menu;

}