<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Animal;
use App\Models\Storie;
use App\Models\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class AnimalController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Animal::with('family')->paginate(5);
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Animals/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $newRecord = Animal::create($request->all());
        // CREATE A STORY LIKE an animal has been registered
        Storie::create([
            'animal_id' => $newRecord->id,
            'description' => $newRecord->name .' a été enregistré dans la base de données'
        ]);
        
        return Redirect::route('animals.index')->with('success' , 'Animal bien enregistré');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $animal = Animal::with('stories','family')->find($id);
        return Inertia::render('Animals/Show' , [
            'animal' => $animal
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animal = Animal::with('stories','family')->find($id);
        return Inertia::render('Animals/Edit', [
            'animal' => $animal
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
        $animal =  Animal::where('id' , $request->id)->first();
        // UNLINK OLD PHOTO
       
        
        if($animal->img_url !== 'no-image.gif'){ // CHECK FOR NOT DELETE NO IMG GIF 
            unlink(public_path('/Images/animaux/'.$animal->img_url));
        }
        // NOW WE CAN UPDATE
        $animal->update($request->all());
        
        // Make the storie for this Animal
        Storie::create([
            'animal_id' => $request->id,
            'description' => $request->name .' a été modifier par ' . Auth::user()->name
        ]);

        return Redirect::route('animals.show', $animal->id)->with('success' , $animal->name .' a bien été Modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        Storie::create([
            'animal_id' => $animal->id,
            'description' => $animal->name .' a été Supprimer par ' . Auth::user()->name
        ]);
        // DELETE PHOTO OF THIS ANIMAL
        
        if($animal->img_url !== 'no-image.gif'){ // CHECK FOR NOT DELETE NO IMG GIF 
            unlink(public_path('/Images/animaux/'.$animal->img_url));
        }
        
        Animal::destroy($animal->id);
        return Redirect::route('animals.index')->with('success', $animal->name .' a bien été supprimer de la base de donnée');
    }
    
}

