<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('priority')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'priority' => 'required|numeric',
        ]);

        Task::create($request->all());
        return redirect()->to(route('tasks.index'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $task->update($request->all());
        return redirect()->to(route('tasks.index'));
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return back();
    }

    public function reorder(Request $request)
    {
        $taskIds = $request->input('newOrder');

        foreach ($taskIds as $index => $taskId) {
            $task = Task::find($taskId);
            $task->priority = $index + 1;
            $task->save();
        }

        return response()->json(['message' => 'Tasks reordered successfully']);
    }
}
