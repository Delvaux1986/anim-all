<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Task::paginate(10);
        return response()->json($data);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $task = Task::where('id' , $id)->first();
        
        return Inertia::render('Tasks/Show' , [
            'task' => $task
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::where('id' , $id)->first();
        return Inertia::render('Tasks/Edit', [
            'task' => $task
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       Task::where('id', $request->id)->first()->update($request->all());
       return Redirect::route('tasks.show', $request->id)->with('success' , $request->title .' a bien été Modifié');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Tasks/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Task::create($request->all());

        return Redirect::route('tasks.index')->with('success', 'Tâche bien enregistré');
    }
}
