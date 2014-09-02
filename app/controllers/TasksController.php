<?php

//repository
use Trackr\Repository\Tasks\InterfaceTasksRepository as TaskRepository;
//services
use Trackr\Services\Validation\TasksValidator as TaskValidator;

class TasksController extends BaseController
{

  /**
   * Task Repository
   *
   * @param  \Trackr\Repository\Tasks\InterfaceTasksRepository
   */
  protected $task;

  /**
   * Task Validation Services
   *
   * @param  \Trackr\Services\Validation\TasksValidator
   */
  protected $validator;

  public function __construct(TaskRepository $task, TaskValidator $validator)
  {
    $this->task = $task;
    $this->validator  = $validator;
  }
  /**
   * Display a listing of the resource.
   * GET /tasks
   *
   * @return Response
   */
  public function index()
  {
    //
    $listOfTodayTasks     = $this->task->today(Auth::user()->user_id)->get();
    $listOfUpcomingTasks  = $this->task->upcoming(Auth::user()->user_id)->paginate(15);
    $data = ['listOfTodayTasks', 'listOfUpcomingTasks'];
    return View::make('backend.tasks.index', compact($data));
  }

  /**
   * Show the form for creating a new resource.
   * GET /tasks/create
   *
   * @return Response
   */
  public function create()
  {
    //
    return View::make('backend.tasks.create');
  }

  /**
   * Store a newly created resource in storage.
   * POST /tasks
   *
   * @return Response
   */
  public function store()
  {
    //
    $data = array_merge(Input::all(), ['user_id' => Auth::user()->user_id]);
    if($this->validator->isValidForCreation($data)){
      DB::beginTransaction();
      if($this->task->create($data)){
        DB::commit();
        Session::flash('success', 'You have successfully created a new task');
        return Redirect::route('tasks.index');
      }else{
        DB::rollBack();
        Session::flash('error', 'Failed to create a new task. Please try again later');
        return Redirect::route('tasks.index');
      }
    }else{
      return Redirect::route('tasks.create')
                    ->withErrors($this->validator->errors())
                    ->withInput();
    }
  }

  /**
   * Display the specified resource.
   * GET /tasks/{id}
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    //
    $task = $this->task->find($id);
    return View::make('backend.tasks.show')
              ->with('task', $task);
  }

  /**
   * Show the form for editing the specified resource.
   * GET /tasks/{id}/edit
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    //
    $task = $this->task->find($id);
    return View::make('backend.tasks.edit')
              ->with('task', $task);
  }

  /**
   * Update the specified resource in storage.
   * PUT /tasks/{id}
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    //
    if($this->validator->isValidForUpdate(Input::all())){
      DB::beginTransaction();
      if($this->task->update($id, Input::all())){
        DB::commit();
        Session::flash('success', 'You have successfully updated a task');
        return Redirect::route('tasks.index');
      }else{
        DB::rollBack();
        Session::flash('error', 'Failed to update this task. Please try again later');
        return Redirect::route('tasks.index');
      }
    }else{
      return Redirect::route('tasks.edit', $id)
                    ->withErrors($this->validator->errors())
                    ->withInput();
    }
  }

  /**
   * Remove the specified resource from storage.
   * DELETE /tasks/{id}
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    //
    $task = $this->task->find($id);
    if ($this->task->delete($task)) {
      Session::flash('success', 'You have successfully deleted "<strong>'. $task['task_name'] .'</strong>"');
      return Redirect::route('tasks.index');
    }
      Session::flash('error', 'Failed to delete task "<strong>'. $task['task_name'] .'</strong>"');
      return Redirect::route('tasks.index');
  }

  public function remove()
  {
    //
    if (Request::ajax()) {
      # code...
      $task = $this->task->find(Input::get('task_id'));
      if ($this->task->delete($task)) {
        $data = ['success' => true];
        return Response::json($data, 201);
      }else{
        $data = ['success' => false];
        return Response::json($data, 201);
      }
    }
  }

  public function changeStatus()
  {
    //
    if (Request::ajax()) {
      # code...
      $id   = Input::get('task_id');
      $task = $this->task->find($id);
      if ($this->task->updateStatus($id)) {
        $data = ['success' => true];
        return Response::json($data, 201);
      }else{
        $data = ['success' => false];
        return Response::json($data, 201);
      }
    }
  }

}