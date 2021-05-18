<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Inertia\Inertia;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   
    public function index(){

        return Inertia::render('Dashboard');
    }
}
