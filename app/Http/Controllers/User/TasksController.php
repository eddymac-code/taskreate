<?php

namespace App\Http\Controllers\User;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('user.tasks.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
            'start_time' => 'required|date|after_or_equal:today',
            'end_time' => 'required|date|after_or_equal:start_time',
            'completed' => 'required',
        ]);

        $task = new Task;
        $task->user_id = auth()->user()->id;
        $task->description = $request->input('description');
        $task->start_time = $request->input('start_time');
        $task->end_time = $request->input('end_time');
        $task->completed = $request->input('completed');
        $task->save();

        return redirect()->route('tasks.show')->with('success', 'Task Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $tasks = Task::get();

        return view('user.tasks.show', [
            'tasks' => $tasks
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);

        return view('user.tasks.edit', [
            'task' => $task
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'description' => 'required',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after_or_equal:start_time',
            'completed' => 'required',
        ]);
        
        $task = Task::find($id);
        $task->description = $request->input('description');
        $task->start_time = $request->input('start_time');
        $task->end_time = $request->input('end_time');
        $task->completed = $request->input('completed');
        $task->save();

        return redirect()->route('tasks.show')->with('success', 'Task Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return back()->with('success', 'Task Removed');
    }
}
