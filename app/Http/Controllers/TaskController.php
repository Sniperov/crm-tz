<?php

namespace App\Http\Controllers;

use App\ServiceTask;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function indexTasks()
    {
        return view('task', ['tasks' => Task::all()]);
    }

    public function indexAddTask()
    {
        return view('addTask');
    }

    public function indexEditTask($id)
    {
        return view('editTask', ['task' => Task::find($id)]);
    }

    public function addTask(Request $request)
    {
        $task = new Task();
        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->price = $request->input('price');
        $task->time = $request->input('time');
        $task->save();

        return redirect('/tasks');
    }

    public function editTask(Request $request, $id)
    {
        $task = Task::find($id);
        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->price = $request->input('price');
        $task->time = $request->input('time');
        $task->update();
    }

    public function deleteTask($id)
    {
        Task::find($id)->delete();
        ServiceTask::where('task_id', $id)->delete();
        return back();
    }
}
