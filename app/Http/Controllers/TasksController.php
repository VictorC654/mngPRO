<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\View\View;

class TasksController extends Controller
{
    public function display(): View
    {
        $tasks = Task::orderBy('created_at', 'desc')->paginate(7);
        $allTasks = Task::all()->count();
            $completedTasks = Task::where('completed', '=', true)->get();
        $cTasksCounted = $completedTasks->count();
        return view('tasks.display', [
            'tasks' => $tasks,
            'allTasks' => $allTasks,
            'completedTasks' => $cTasksCounted
        ]);
    }
    public function register()
    {
        $request = request();

        Task::create([
            'title' => $request['title'],
            'description' => $request['description']
        ]);

        return redirect('/tasks');
    }
    public function complete($id)
    {
        $task = Task::findOrFail($id);
        $task->completed = true;
        $task->save();
        return redirect("tasks")->with('message', 'success');
    }
    public function delete($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect("tasks");
    }
}
