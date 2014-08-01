<?php

//repository
use Trackr\Repository\Announcements\InterfaceAnnouncementsRepository as AnnouncementRepository;
use Trackr\Repository\Projects\InterfaceProjectsRepository as ProjectRepository;
use Trackr\Repository\Departments\InterfaceDepartmentsRepository as DepartmentRepository;
use Trackr\Repository\Users\InterfaceUsersRepository as UserRepository;

class BaseController extends Controller
{

	/**
	 * Announcement Repository
	 *
	 * @param  \Trackr\Repository\Announcements\InterfaceAnnouncementsRepository
	 */
	protected $announcement;

	/**
	 * Project Repository
	 *
	 * @param  \Trackr\Repository\Projects\InterfaceProjectsRepository
	 */
	protected $project;

	/**
	 * Department Repository
	 *
	 * @param  \Trackr\Repository\Departments\InterfaceDepartmentsRepository
	 */
	protected $department;

	/**
	 * User Repository
	 *
	 * @param  \Trackr\Repository\Users\InterfaceUsersRepository
	 */
	protected $user;


	public function __construct(
		AnnouncementRepository $announcement,
		ProjectRepository $project,
		DepartmentRepository $department,
		UserRepository $user
	)
	{
		$this->announcement = $announcement;
		$this->project  		= $project;
		$this->department  	= $department;
		$this->user 				= $user;
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	public function getDashboard()
	{

		if(Auth::user()->group_id == 1 || Auth::user()->group_id == 2) {
			$countOfAnnouncement 	= $this->announcement->count();
			$countOfProject 			= $this->project->count();
			$countOfDepartment 		= $this->department->count();
			$countOfUser 					= $this->user->count();

			$listOfAnnouncement 	= $this->announcement->getRecentRecord(5);
			$listOfProject 				= $this->project->getRecentRecord(5);
			$listOfDepartment 		= $this->department->getRecentRecord(5);
			$listOfUser 					= $this->user->getRecentRecord(5);

			$data = [
				'countOfAnnouncement', 'countOfProject', 'countOfDepartment', 'countOfUser',
				'listOfAnnouncement', 'listOfProject', 'listOfDepartment', 'listOfUser'
			];
			return View::make('backend.dashboard.index-admin',compact($data));
		}else{

			$listOfAnnouncement 	= $this->announcement->getRecentRecord(5);
			$data = ['listOfAnnouncement'];
			return View::make('backend.dashboard.index-user',compact($data));

		}



	}

	public function getChangePassword()
	{
		return View::make('backend.change-password');
	}

	public function postChangePassword()
	{
		$user = User::find(Auth::user()->user_id);
		$user->fill(Input::all());
		if($user->save()){
			return Redirect::route('app.change-password')
										->with('success', 'You have successfully change your password');
		}
	}

}
