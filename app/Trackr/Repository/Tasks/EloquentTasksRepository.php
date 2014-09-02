<?php namespace Trackr\Repository\Tasks;

use Illuminate\Database\Eloquent\Model;

use Trackr\Repository\EloquentBaseRepository;
use Trackr\Repository\Tasks\InterfaceTasksRepository;

use Carbon\Carbon;

class EloquentTasksRepository extends EloquentBaseRepository implements InterfaceTasksRepository
{
  /**
   * Eloquent model
   *
   * @var Illuminate\Database\Eloquent\Model
   */
  protected $task;

  public function __construct(Model $task)
  {
    parent::__construct($task);
    $this->task = $task;
  }

  public function today($userId)
  {
    $startDay = Carbon::now()->startOfDay();
    $endDay   = Carbon::now()->endOfDay();
    return $this->task->whereBetween('task_due_date', [$startDay, $endDay])
                      ->where('isDone', 0)
                      ->where('user_id', $userId);
  }

  public function upcoming($userId)
  {
    return $this->task->where('task_due_date', '>', Carbon::now())
                      ->orderBy('task_due_date', 'ASC')
                      ->where('user_id', $userId);
  }

  public function updateStatus($id)
  {
    $task = $this->task->find($id);
    ($task['isDone']) ? $task->isDone = 0 : $task->isDone = 1;
    return $task->save();
  }

  public function getCalendarTasks($userId)
  {
    $date = Carbon::now()->startOfDay();
    $calendar = [];
    $listOfTasks = $this->task->where('task_due_date', '>=', $date)
                              ->where('user_id', $userId)
                              ->get();
    foreach($listOfTasks as $tasks){
      $data = [
        'title' => $tasks['task_name'],
        'start' => date('Y-m-d', strtotime($tasks['task_due_date']))
      ];
      array_push($calendar, $data);
    }

    return json_encode($calendar);
  }
}