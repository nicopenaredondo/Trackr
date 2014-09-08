<?php

if(!function_exists('getMenuByGroup')){
  function getMenuByGroup($group_id)
  {
    $menu = [];
    if ($group_id == 1) {
      # code...
      $menu = [
        [
          'name'  => 'Dashboard',
          'machine_name' => '',
          'url'   => URL::route('app.dashboard'),
          'icon'  => 'fa-home icon-sidebar'
        ],
        [
          'name'  => 'Members',
          'machine_name' => 'users',
          'url'   => URL::route('users.index'),
          'icon'  => 'fa-users icon-sidebar'
        ],
        [
          'name'  => 'Projects',
          'machine_name' => 'projects',
          'url'   => URL::route('projects.index'),
          'icon'  => 'fa-list icon-sidebar'
        ],
        [
          'name'  => 'Announcements',
          'machine_name' => 'announcements',
          'url'   => URL::route('announcements.index'),
          'icon'  => 'fa-bullhorn icon-sidebar'
        ],
        [
          'name'  => 'Attendances',
          'machine_name' => 'attendances',
          'url'   => URL::route('attendances.index'),
          'icon'  => 'fa-calendar icon-sidebar'
        ],
        [
          'name'  => 'Departments',
          'machine_name' => 'departments',
          'url'   => URL::route('departments.index'),
          'icon'  => 'fa-building icon-sidebar'
        ],
        [
          'name'  => 'Jobs',
          'machine_name' => 'jobs',
          'url'   => URL::route('jobs.index'),
          'icon'  => 'fa-user icon-sidebar'
        ],

      ];

    }elseif ($group_id == 2) {
      # code...
      $menu = [
        [
          'name'  => 'Dashboard',
          'machine_name' => '',
          'url'   => URL::route('app.dashboard'),
          'icon'  => 'fa-home icon-sidebar'
        ],
        [
          'name'  => 'Projects',
          'machine_name' => 'projects',
          'url'   => URL::route('projects.index'),
          'icon'  => 'fa-list icon-sidebar'
        ],
        [
          'name'  => 'Announcements',
          'machine_name' => 'announcements',
          'url'   => URL::route('announcements.index'),
          'icon'  => 'fa-bullhorn icon-sidebar'
        ],
        [
          'name'  => 'Attendances',
          'machine_name' => 'attendances',
          'url'   => URL::route('attendances.index'),
          'icon'  => 'fa-calendar icon-sidebar'
        ],
      ];

    }elseif ($group_id == 3) {
      # code...
      $menu = [
        [
          'name'  => 'Dashboard',
          'machine_name' => '',
          'url'   => URL::route('app.dashboard'),
          'icon'  => 'fa-home icon-sidebar'
        ],
        [
          'name'  => 'Projects',
          'machine_name' => 'projects',
          'url'   => URL::route('projects.index'),
          'icon'  => 'fa-list icon-sidebar'
        ],
        [
          'name'  => 'Announcements',
          'machine_name' => 'announcements',
          'url'   => URL::route('announcements.index'),
          'icon'  => 'fa-bullhorn icon-sidebar'
        ],
        [
          'name'  => 'Attendances',
          'machine_name' => 'attendances',
          'url'   => URL::route('attendances.index'),
          'icon'  => 'fa-calendar icon-sidebar'
        ],
        [
          'name'  => 'Tasks',
          'machine_name' => 'tasks',
          'url'   => URL::route('tasks.index'),
          'icon'  => 'fa-tasks icon-sidebar'
        ],
      ];

    }elseif ($group_id == 4) {
      # code...
      $menu = [
        [
          'name'  => 'Dashboard',
          'machine_name' => '',
          'url'   => URL::route('app.dashboard'),
          'icon'  => 'fa-home icon-sidebar'
        ],
        [
          'name'  => 'Announcements',
          'machine_name' => 'announcements',
          'url'   => URL::route('announcements.index'),
          'icon'  => 'fa-bullhorn icon-sidebar'
        ],
        [
          'name'  => 'Attendances',
          'machine_name' => 'attendances',
          'url'   => URL::route('attendances.index'),
          'icon'  => 'fa-calendar icon-sidebar'
        ],
        [
          'name'  => 'Tasks',
          'machine_name' => 'tasks',
          'url'   => URL::route('tasks.index'),
          'icon'  => 'fa-tasks icon-sidebar'
        ],
      ];

    }else{}

    return $menu;

  }
}

if(!function_exists('getPermissionByGroup')){
  function getPermissionByGroup($group_id)
  {
    $permission = [];
    if ($group_id == 1) {
      # code...
      $permission = [
        [
          'permission_name'     => 'users',
          'permission_actions'  => ['add','edit','delete']
        ],
        [
          'permission_name'     => 'projects',
          'permission_actions'  => ['add','edit','delete']
        ],
        [
          'permission_name'     => 'announcements',
          'permission_actions'  => ['add','edit','delete']
        ],
        [
          'permission_name'     => 'attendances',
          'permission_actions'  => ['add','edit','delete']
        ],
        [
          'permission_name'     => 'departments',
          'permission_actions'  => ['add','edit','delete']
        ],
        [
          'permission_name'     => 'jobs',
          'permission_actions'  => ['add','edit','delete']
        ]
      ];
    }elseif ($group_id == 2) {
      # code...
      $permission = [
        [
          'permission_name'     => 'projects',
          'permission_actions'  => ['add','edit','delete']
        ],
        [
          'permission_name'     => 'announcements',
          'permission_actions'  => ['add','edit','delete']
        ],
        [
          'permission_name'     => 'attendances',
          'permission_actions'  => ['add','edit','delete']
        ]
      ];
    }elseif ($group_id == 3) {
      # code...
      $permission = [
        [
          'permission_name'     => 'projects',
          'permission_actions'  => []
        ],
        [
          'permission_name'     => 'announcements',
          'permission_actions'  => []
        ],
        [
          'permission_name'     => 'attendances',
          'permission_actions'  => []
        ],
        [
          'permission_name'     => 'tasks',
          'permission_actions'  => ['add', 'edit', 'delete']
        ]
      ];
    }elseif ($group_id == 4) {
      # code...
      $permission = [
        [
          'permission_name'     => 'announcements',
          'permission_actions'  => []
        ],
        [
          'permission_name'     => 'attendances',
          'permission_actions'  => []
        ],
        [
          'permission_name'     => 'tasks',
          'permission_actions'  => ['add', 'edit', 'delete']
        ],
          'permission_name'     => 'change-password',
          'permission_actions'  => []
      ];
    }

    return $permission;

  }
}
