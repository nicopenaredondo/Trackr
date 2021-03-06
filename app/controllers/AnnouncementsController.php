<?php

//repository
use Trackr\Repository\Announcements\InterfaceAnnouncementsRepository as AnnouncementRepository;
//gateway
use Trackr\Gateway\AnnouncementGateway;
//services
use Trackr\Services\Validation\AnnouncementsValidator as AnnouncementValidator;

class AnnouncementsController extends BaseController
{

  /**
   * Announcement Repository
   *
   * @param  \Trackr\Repository\Announcements\InterfaceAnnouncementsRepository
   */
  protected $announcement;

  /**
   * Announcement Gateway
   *
   * @param  \Trackr\Gateway\AnnouncementGateway;
   */
  protected $announcementGateway;

  /**
   * Announcement Validation Service
   *
   * @param  \Trackr\Services\Validation\AnnouncementsValidator
   */
  protected $validator;

  public function __construct(
    AnnouncementRepository $announcement,
    AnnouncementGateway $announcementGateway,
    AnnouncementValidator $validator)
  {
    $this->announcement         = $announcement;
    $this->announcementGateway  = $announcementGateway;
    $this->validator            = $validator;
  }

  /**
   * Display a listing of the resource.
   * GET /announcements
   *
   * @return Response
   */
  public function index()
  {
    //
    $listOfAnnouncements = $this->announcement->paginate(15);
    return View::make('backend.announcements.index')
              ->with('listOfAnnouncements', $listOfAnnouncements);
  }

  /**
   * Show the form for creating a new resource.
   * GET /announcements/create
   *
   * @return Response
   */
  public function create()
  {
    //
    return View::make('backend.announcements.create');
  }

  /**
   * Store a newly created resource in storage.
   * POST /announcements
   *
   * @return Response
   */
  public function store()
  {
    //
   if($this->announcementGateway->create(Input::all())){
      Session::flash('success', 'You have successfully created a new announcement');
      return Redirect::route('announcements.index');
    }

    return Redirect::route('announcements.create')
                  ->with('error', 'Failed to create a new announcement. This incident will be reported')
                  ->withErrors($this->announcementGateway->errors())
                  ->withInput();
  }

  /**
   * Display the specified resource.
   * GET /announcements/{id}
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    //
    $announcement = $this->announcement->find($id);
    return View::make('backend.announcements.show')
              ->with('announcement', $announcement);
  }

  /**
   * Show the form for editing the specified resource.
   * GET /announcements/{id}/edit
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    //
    $announcement = $this->announcement->find($id);
    return View::make('backend.announcements.edit')
              ->with('announcement', $announcement);
  }

  /**
   * Update the specified resource in storage.
   * PUT /announcements/{id}
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    //
   if($this->announcementGateway->update($id, Input::all())){
      Session::flash('success', 'You have successfully updated this announcement');
      return Redirect::route('announcements.show', $id);
    }

    return Redirect::route('announcements.edit',$id)
                  ->with('error', 'Failed to update this announcement. This incident will be reported')
                  ->withErrors($this->announcementGateway->errors())
                  ->withInput();
  }

  /**
   * Remove the specified resource from storage.
   * DELETE /announcements/{id}
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    //
    $announcement = $this->announcement->find($id);
    if ($this->announcement->delete($announcement)) {
      Session::flash('success', 'You have successfully deleted "<strong>'. $announcement['announcement_title'] .'</strong>"');
      return Redirect::route('announcements.index');
    }
      Session::flash('error', 'Failed to delete announcement "<strong>'. $announcement['announcement_title'] .'</strong>"');
      return Redirect::route('departments.index');
  }

}