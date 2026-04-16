<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;
use Illuminate\Support\Facades\auth;

class TaskManager extends Controller
{
    function listTask()
    {
        // This is for authenticated user only where just show his tasks
        $tasks = Tasks::where('user_id', Auth::user()->id)->where('status', 'pending')->orderBy('deadline', 'asc')->paginate(3);
        return view('welcome', compact('tasks')); // to pass variable to welcome view
    }
    function addTask()
    {
        return view('tasks.add');
    }

    function addTaskPost(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required|date',
        ]);

        // return $request->all();
        // return back()->with('success', 'Task has been added successfully!');

        $task = new Tasks();
        // The name of input field in html should be same as the column name of the table
        $task->title = $request->title;
        $task->description = $request->description;
        $task->deadline = $request->deadline;
        $task->user_id = Auth::user()->id; // Assuming user is authenticated
        if ($task->save()) {
            return redirect(route('home'))->with('success', 'Task has been added successfully!');
        }
        return redirect(route('task.add'))->with('error', 'Something went wrong!');
    }


    function updateTaskStatus($id)
    {
        if (Tasks::where('user_id', Auth::user()->id)->where('id', $id)->update(['status' => 'completed'])) {
            return redirect(route('home'))->with('success', 'Task completed successfully!');
        }
        return redirect(route('home'))->with('error', 'Something went wrong!');
    }

    function deleteTask($id)
    {
        if (Tasks::where('user_id', Auth::user()->id)->where('id', $id)->delete()) {
            return redirect(route('home'))->with('success', 'Task deleted successfully!');
        }
        return redirect(route('home'))->with('error', 'Something went wrong!');
    }
}
