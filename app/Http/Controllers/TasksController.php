<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\View\View;
class TasksController extends Controller
{
    public function getDataForTasks(): array
    {
        $allTasks = Task::all()->count();
        $completedTasks = Task::where('completed', '=', true)->get()->count();
        $request = Request();
        return [$allTasks, $completedTasks, $request];
    }
    public function display(): View
    {
        $tasks = Task::orderBy('created_at', 'desc')->paginate(6);

        return view('tasks.display', [
            'tasks' => $tasks,
            'allTasks' => $this->getDataForTasks()[0],
            'completedTasks' => $this->getDataForTasks()[1],
            'request' => $this->getDataForTasks()[2],
        ]);
    }
    public function sortByCompleted(): View
    {
        $tasks = Task::where("completed", "=" , "1")->orderBy("created_at", "desc")->paginate(6);

        return view('tasks.display', [
            'tasks' => $tasks,
            'allTasks' => $this->getDataForTasks()[0],
            'completedTasks' => $this->getDataForTasks()[1],
            'request' => $this->getDataForTasks()[2],
        ]);
    }
    public function sortByInProgress(): View
    {
        $tasks = Task::where("completed", "=" , "0")->orderBy("created_at", "desc")->paginate(6);

        return view('tasks.display', [
            'tasks' => $tasks,
            'allTasks' => $this->getDataForTasks()[0],
            'completedTasks' => $this->getDataForTasks()[1],
            'request' => $this->getDataForTasks()[2],
        ]);
    }
    public function register(): RedirectResponse
    {
        $request = request();

        Task::create([
            'title' => $request['title'],
            'description' => $request['description']
        ]);

        return redirect()->back();
    }
    public function complete($id, Request $request): RedirectResponse
    {
        $task = Task::findOrFail($id);
        $task->completed = true;
        $task->save();
        return redirect()->back();
    }
    public function delete($id): RedirectResponse
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->back();
    }
}
