<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function add()
    {
        $categories = Category::get();
        return view('test.task.add',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'taskname' => 'required',
            'taskdescription' => 'required',
            'category_id' => 'required',
        ]);

        // dd($request);
        $task = new Task();
        $task->c_id = $request->category_id;
        $task->task_name = $request->taskname;
        $task->task_description = $request->taskdescription;
        $task->status = "New";
        $task->save();
        return redirect('task/show')->with('success','task Successfully added..');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $categories = Category::get();
        $tasks = Task::join('categories','categories.id','=','tasks.c_id')
        ->where('tasks.is_delete',0)
        ->select('categories.*','categories.id as c_id','tasks.*')
        ->get();
        // dd($tasks);
        return view('test.task.view',compact('tasks','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task,$id)
    {
        $categories = Category::get();
        $edit = Task::find($id);
        return view('test.task.edit',compact('edit','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task,$id)
    {
        $request->validate([
            'taskname' => 'required',
            'taskdescription' => 'required',
            'category_id' => 'required',
        ]);

        // dd($request);
        $update = Task::find($id);
        $update->task_name = $request->taskname;
        $update->task_description = $request->taskdescription;
        $update->c_id = $request->category_id;
        $update->estimated_hour = $request->estimatedhour;
        $update->actual_hour = $request->actualhour;
        $update->status = $request->status;
        $update->update();
        return redirect('task/show')->with('success','Task has Been updated Successfully...');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task,$id)
    {
        $delete = Task::find($id);
        $delete->is_delete = 1;
        $delete->update();
        return redirect('task/show')->with('success','Delete has been successfully..');

    }
}
