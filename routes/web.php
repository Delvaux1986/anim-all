<?php

use Inertia\Inertia;
use App\Models\Animal;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class , 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class , 'index'])->middleware(['auth:sanctum', 'verified'])->name('dashboard');
Route::get('/animals' , [DashboardController::class , 'animals'])->middleware(['auth:sanctum', 'verified'])->name('animals.index');
Route::get('/animals/create' , [AnimalController::class , 'create'])->middleware(['auth:sanctum', 'verified'])->name('animals.create');
Route::post('/uploadPhoto' , [FileController::class , 'storePhoto'])->middleware(['auth:sanctum', 'verified']);
Route::post('/animals/store' , [AnimalController::class , 'store'])->middleware(['auth:sanctum', 'verified'])->name('animals.store');

Route::get('/users' , [DashboardController::class , 'users'])->middleware(['auth:sanctum', 'verified'])->name('employes.index');
Route::get('/tasks' , [DashboardController::class , 'tasks'])->middleware(['auth:sanctum', 'verified'])->name('tasks.index');


// ROUTE OF COMPONENTS TABLE

Route::get('/getAllAnimals' , [AnimalController::class , 'index'])->middleware(['auth:sanctum', 'verified']);
Route::get('/getAllUsers', [UserController::class, 'index'])->middleware(['auth:sanctum', 'verified']);
Route::get('/getAllTasksforTable', [TaskController::class, 'index'])->middleware(['auth:sanctum', 'verified']);


