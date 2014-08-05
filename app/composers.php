<?php
View::composer('backend.users.*', function($view)
{
	$permissionList  = getPermissionByGroup(Auth::user()->group_id);
	$permittedAction = [];

	foreach($permissionList as $permission){
		if($permission['permission_name'] == 'users'){
			$permittedAction = $permission['permission_actions'];
		}
	}
	$view->with('permittedAction', $permittedAction);
});


View::composer('backend.projects.*', function($view)
{
	$permissionList  = getPermissionByGroup(Auth::user()->group_id);
	$permittedAction = [];

	foreach($permissionList as $permission){
		if($permission['permission_name'] == 'projects'){
			$permittedAction = $permission['permission_actions'];
		}
	}
	$view->with('permittedAction', $permittedAction);
});

View::composer('backend.announcements.*', function($view)
{
	$permissionList  = getPermissionByGroup(Auth::user()->group_id);
	$permittedAction = [];

	foreach($permissionList as $permission){
		if($permission['permission_name'] == 'announcements'){
			$permittedAction = $permission['permission_actions'];
		}
	}
	$view->with('permittedAction', $permittedAction);
});

View::composer('backend.attendances.*', function($view)
{
	$permissionList  = getPermissionByGroup(Auth::user()->group_id);
	$permittedAction = [];

	foreach($permissionList as $permission){
		if($permission['permission_name'] == 'attendances'){
			$permittedAction = $permission['permission_actions'];
		}
	}
	$view->with('permittedAction', $permittedAction);
});

View::composer('backend.departments.*', function($view)
{
	$permissionList  = getPermissionByGroup(Auth::user()->group_id);
	$permittedAction = [];

	foreach($permissionList as $permission){
		if($permission['permission_name'] == 'departments'){
			$permittedAction = $permission['permission_actions'];
		}
	}
	$view->with('permittedAction', $permittedAction);
});

View::composer('backend.jobs.*', function($view)
{
	$permissionList  = getPermissionByGroup(Auth::user()->group_id);
	$permittedAction = [];

	foreach($permissionList as $permission){
		if($permission['permission_name'] == 'jobs'){
			$permittedAction = $permission['permission_actions'];
		}
	}
	$view->with('permittedAction', $permittedAction);
});
