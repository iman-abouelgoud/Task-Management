<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Requests\ValidateTaskProjectRequest;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(ValidateTaskProjectRequest $request){

        if($request->project_id == 0) {
            $tasks = Task::orderBy('priority')->paginate(5);
        }
        else {
            $tasks = Task::when(request()->has('project_id'), function ($query) {
                $query->where('project_id', request()->get('project_id'));
            })->orderBy('priority')->paginate(5);
        }

        $projects = Project::select('id', 'name')->get();
        return view('tasks.index', compact('tasks', 'projects'));
    }

    public function create() {

        $projects = Project::select('id', 'name')->get();
        return view('tasks.create', compact('projects'));
    }

    public function store(StoreTaskRequest $request) {

        $validated = $request->validated();
        $validated['user_id'] = User::whereEmail('john@example.com')->pluck('id')->first();

        Task::create($validated);
        return redirect()->route('tasks.index')->with('success', 'Task created successfully !');
    }

    public function edit(Task $task) {

        $projects = Project::select('id', 'name')->get();
        return view('tasks.edit', compact('task', 'projects'));
    }

    public function update(UpdateTaskRequest $request, Task $task) {

        $validated = $request->validated();
        $task->update($validated);
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully !');
    }

    public function destroy(Task $task){

        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully !');
    }

    public function updatePriority() {

        $priorities = explode(',', request('priorities'));

        foreach($priorities as $key => $priority) {
            Task::where('id', $priority)->update(['priority' => $key+1]);
        }

        return response()->json(['message' => 'Priority updated successfully']);
    }
}
