<?php

//repository
use Trackr\Repository\Attendances\InterfaceAttendancesRepository as AttendanceRepository;
//services
use Trackr\Services\Validation\AttendancesValidator as AttendanceValidator;

class AttendancesController extends BaseController
{

	/**
	 * Attendance Repository
	 *
	 * @param  \Trackr\Repository\Attendances\InterfaceAttendancesRepository
	 */
	protected $attendance;

	/**
	 * Attendance Validation Services
	 *
	 * @param  \Trackr\Services\Validation\AttendancesValidator
	 */
	protected $validator;

	public function __construct(AttendanceRepository $attendance, AttendanceValidator $validator)
	{
		$this->attendance = $attendance;
		$this->validator 	= $validator;
	}

	/**
	 * Display a listing of the resource.
	 * GET /attendances
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		if(Auth::user()->group_id == 1) {
			$today = date('F j, Y', strtotime(date('Y-m-d')));
			$listOfAttendances = $this->attendance->getAttendanceToday()
			                                      ->paginate(15);
			return View::make('backend.attendances.index-admin')
								->with('listOfAttendances', $listOfAttendances)
								->with('dateToday', $today);
		}else{
			$listOfAttendances = $this->attendance->getAttendanceHistory(Auth::user()->user_id)
																						->orderBy('created_at','DESC')
																						->paginate(15);
			$isLogin   	= $this->attendance->isLogin(Auth::user()->user_id);
			$isLogout   = $this->attendance->isLogout(Auth::user()->user_id);
			return View::make('backend.attendances.index-user')
								->with('listOfAttendances', $listOfAttendances)
								->with('isLogin', $isLogin)
								->with('isLogout', $isLogout);
		}
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /attendances/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /attendances
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		if($this->attendance->isLogin(Auth::user()->user_id)){

			DB::beginTransaction();
			if($this->attendance->updateAttendance(Auth::user()->user_id)){
				DB::commit();
				Session::flash('success', 'You have successfully logged out');
				return Redirect::route('attendances.index');
			}else{
				DB::rollBack();
				Session::flash('error', 'Failed to process your logout attempt. Please try again later');
				return Redirect::route('attendances.index');
			}

		}else{

			DB::beginTransaction();
			if($this->attendance->attend(Auth::user()->user_id)){
				DB::commit();
				Session::flash('success', 'You have successfully logged in');
				return Redirect::route('attendances.index');
			}else{
				DB::rollBack();
				Session::flash('error', 'Failed to process your login attempt. Please try again later');
				return Redirect::route('attendances.index');
			}

		}
	}

	/**
	 * Display the specified resource.
	 * GET /attendances/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//

	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /attendances/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$attendance = $this->attendance->find($id);
		return View::make('backend.attendances.edit')
							->with('attendance', $attendance);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /attendances/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		if($this->validator->isValidForUpdate(Input::all())){
			DB::beginTransaction();
			if($this->attendance->update($id, Input::all())){
				DB::commit();
				Session::flash('success', 'You have successfully updated attendance #'. $id);
				return Redirect::route('attendances.index');
			}else{
				DB::rollBack();
				Session::flash('error', 'Failed to update this attendance. Please try again later');
				return Redirect::route('attendances.index');
			}
		}else{
			return Redirect::route('attendances.edit', $id)
			              ->withErrors($this->validator->errors())
			              ->withInput();
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /attendances/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}