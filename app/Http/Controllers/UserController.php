<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::with('role')->paginate(5);
        return response()->json($data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with('role')->find($id);
        return Inertia::render('Users/Show',[
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with('role')->find($id);
        return Inertia::render('Users/Edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
       $user = User::where('id' , $request->id)->first();
       $urlSplit = explode('/', $user->profile_photo_path);
       $filename = $urlSplit[4];
       if($filename !== 'no-image.gif'){ // CHECK FOR NOT DELETE NO IMG GIF 
        unlink(storage_path('app/public/uploads/users/'.$filename));
        }
       $user->update($request->all());
       return Redirect::route('employes.show', $user->id)->with('success' , $user->name .' a bien été Modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // DELETE PHOTO OF THIS ANIMAL
        $urlSplit = explode('/', $user->profile_photo_path);
        $filename = $urlSplit[4];
        if($filename !== 'no-image.gif'){ // CHECK FOR NOT DELETE NO IMG GIF 
            unlink(storage_path('app/public/uploads/users/'.$filename));
        }
        User::destroy($user->id);
        return Redirect::route('employes.index')->with('success', $user->name .' a bien été supprimer de la base de donnée');
    }
}
