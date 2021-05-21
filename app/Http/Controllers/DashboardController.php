<?php

namespace App\Http\Controllers;


use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
   
    public function index(){

        return Inertia::render('Dashboard');
    }

    public function animals(){
        $roleUser = Auth::user()->role_id;
        return Inertia::render('Animals/Index', [
            'role' => $roleUser
        ]);
    }
}
