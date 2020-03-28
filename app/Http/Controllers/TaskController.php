<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Task::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task=[
            'title'=>$request->title,
            'isCompleted'=>$request->isCompleted,
        ];



        Task::create($task);

        return response()->json($task);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $taskss,$task=0)
    {
        //dd();
        $data = [
            'title' => $request->title,
            'isCompleted' => $request->isCompleted
        ];

        $dataFind=$taskss::find($task);
        $dataFind->title= $request->title;
        $dataFind->isCompleted= $request->isCompleted;
        $dataFind->save();
        return response()->json($dataFind);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        if($task->delete())
        {
            return response()->json(['success'=>1,'message'=>'Record deleted successfully!']);
        }
        else {
            return response()->json(['success' =>0, 'message' => 'Record failed to delete']);
        }
    }
}
