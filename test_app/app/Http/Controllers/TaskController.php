<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;

class TaskController extends Controller
{
    // Show tasks and task creation form
    public function index() {
        $tasks = Tasks::all(); // Get all tasks
        return view('tasks.list', ['tasks' => $tasks]);
    }

    // Show add task form
    public function create()
    {
        return view('tasks.add_task');
    }

    // Add new task
    public function store(Request $request) {
        $newTask = Tasks::create([
            'task_name' => $request->task_name,
            'due_for' => $request->due_for,
        ]);
        return redirect('/');
    }

    // View edit task
    public function edit(Product $product)
    {
        return view('product.edit', [
            'product' => $product,
        ]);
    }

    // Update task
    public function update(Request $request, Task $task)
    {
        $task->update([
            'completed' => ($task->completed ? false : true )
        ]);
        
        return redirect('/' . $task->id . '/edit');
    }

    // Delete task
    public function destroy(Task $task)
    {
        $product->delete();
        return redirect('/');
    }

}
