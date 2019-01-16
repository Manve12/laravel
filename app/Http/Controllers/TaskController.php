<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TaskController extends Controller
{
    public function store()
    {
      //check if user is a member only, if true, forbid access
      if (auth()->user()->role === 'member') return response('', 403);

      //create task with the necessary detail
      $task = factory('App\Task')->create([
        'user_id' => request('user_id'),
        'assigned_user_id' => request('assigned_user_id') ?: null,
        'title' => request('title'),
        'description' => request('description'),
        'complete' => request('complete') ?: false,
        'priority' => request('priority') ?: 'low'
      ]);

      //save task and redirect
      $task->save();

      if (request()->wantsJson()) return response($task, 201);

      return redirect('/tasks/' . $task->id);
    }

    public function show(Task $task)
    {
      return view('task.index', compact('task'));
    }

    public function update($id)
    {
      //find the task by id
      $task = Task::find((int)$id);
      //set task to complete and save it
      $task->complete = !$task->complete;
      $task->save();

      return redirect('/tasks/'.$id);
    }

    public function edit($id)
    {
      //find the task by id
      $task = Task::find((int)$id);

      //set values to the request or back to default
      $task->assigned_user_id = request('assigned_user_id') ?: $task->assigned_user_id;
      $task->title = request('title') ?: $task->title;
      $task->description = request('description') ?: $task->description;
      $task->complete = request('complete') ?: $task->complete;
      $task->priority = request('priority') ?: $task->priority;

      $task->save();

      return redirect('/tasks/' . $id);
    }

    public function destroy($id)
    {
      // if not moderator, return 403
      if (auth()->user()->role != 'moderator') return response('', 403);

      //find task and delete it
      $task = Task::find($id);
      $task->delete();

      //get fresh copy of task, if doesn't exist. redirect
      if (! $task->fresh() ){
        return redirect('/tasks');
      } else {
        return response('Task could not be deleted', 500);
      }
    }
}
