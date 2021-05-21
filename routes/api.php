<?php

use App\Http\Controllers\AnimalController;
use App\Models\Animal;
use App\Models\Family;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/getAllTasks' , function (){
    return Task::all();
});


Route::get('/getAllFamily' , function() {
    return Family::all();
});



