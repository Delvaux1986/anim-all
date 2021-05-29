<?php

namespace App\Http\Controllers;

use App\Models\Cage;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Cage::with('animals')->paginate(5);
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Cages/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cage::create($request->all());
        return Redirect::route('cages.index')->with('success' , 'Cage bien enregistré');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cage  $cage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cage = Cage::with('animals')->find($id);
        return Inertia::render('Cages/Show', [
            'cage' => $cage
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cage  $cage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cage = Cage::with('animals')->find($id);
        return Inertia::render('Cages/Show', [
            'cage' => $cage
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cage  $cage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cage $cage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cage  $cage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cage $cage)
    {
        //
    }
}
