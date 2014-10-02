<?php namespace Trackr\Gateway;

use App;
use DB;
use Trackr\Repository\Announcements\InterfaceAnnouncementsRepository as AnnouncementRepository;
use Trackr\Services\Validation\AnnouncementsValidator as AnnouncementValidator;


class AnnouncementGateway
{
  /**
   * Form Data
   *
   * @var array
   */
  protected $data;

  /**
   * Announcement Repository
   *
   * @param  \Trackr\Repository\Announcements\InterfaceAnnouncementsRepository
   */
  protected $announcement;

  /**
   * Announcement Validation Service
   *
   * @param  \Trackr\Services\Validation\AnnouncementsValidator
   */
  protected $validator;

  public function __construct(AnnouncementRepository $announcement, AnnouncementValidator $validator)
  {
    $this->announcement = $announcement;
    $this->validator    = $validator;
  }

  public function create($data)
  {
    DB::beginTransaction();
    if($this->validator->isValidForCreation($data)){
      DB::commit();
      return $this->announcement->create($data);
    }
    DB::rollBack();
    return false;
  }

  public function update($id, $data)
  {
    DB::beginTransaction();
    if($this->validator->isValidForUpdate($data)){
      DB::commit();
      return $this->announcement->update($id, $data);
    }
    DB::rollBack();
    return false;
  }

  public function errors()
  {
    return $this->validator->errors();
  }


}