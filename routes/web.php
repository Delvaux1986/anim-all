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
use App\Http\Controllers\CageController;
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
// CLIENT SIDE 
Route::get('/', [HomeController::class , 'index'])->name('home');



// DASHBOARD SIDE FOR GESTION OF SPA 

// DASHBOARD ANIMALS 
Route::middleware(['auth:sanctum', 'verified'])->group(function() {
    //LANDING PAGE
    Route::get('/dashboard', [DashboardController::class , 'index'])->name('dashboard');

    // ALL FOR ANIMALS
    Route::get('/animals' , [DashboardController::class , 'animals'])->name('animals.index');
    Route::get('/animals/create' , [AnimalController::class , 'create'])->name('animals.create');
    Route::post('/uploadPhoto' , [FileController::class , 'storeAnimalPhoto']);
    Route::post('/animals/store' , [AnimalController::class , 'store'])->name('animals.store');
    Route::get('/animals/show/{id}' , [AnimalController::class, 'show'])->name('animals.show');
    Route::get('/animals/edit/{id}', [AnimalController::class, 'edit'])->name('animals.edit');
    Route::post('/animals/update', [AnimalController::class, 'update'])->name('animals.update');
    Route::delete('/animals/{animal}', [AnimalController::class, 'destroy'])->name('animals.delete');
    
    // ALL FOR TASKS
    
    Route::get('/tasks' , [DashboardController::class , 'tasks'])->name('tasks.index');
    Route::get('/tasks/create' , [TaskController::class , 'create'])->name('tasks.create');
    Route::post('/tasks/store' , [TaskController::class , 'store'])->name('tasks.store');
    Route::get('/tasks/show/{id}' , [TaskController::class, 'show'])->name('tasks.show');
    Route::get('/tasks/edit/{id}', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::post('/tasks/update', [TaskController::class, 'update'])->name('tasks.update');
    
    
    // ALL FOR USERS@EMPLOYES
    Route::get('/users' , [DashboardController::class , 'users'])->name('employes.index');
    Route::get('/users/create' , [UserController::class , 'create'])->name('employes.create');
    Route::get('/users/show/{id}' , [UserController::class, 'show'])->name('employes.show');
    Route::post('/uploadUserPhoto' , [FileController::class , 'storeUserPhoto']);
    Route::get('/users/edit/{id}' , [UserController::class , 'edit'])->name('employes.edit');
    Route::post('/users/update', [UserController::class, 'update'])->name('employes.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('employes.delete');
    // ALL FOR CAGES
    Route::get('/cages' , [DashboardController::class, 'cages'])->name('cages.index');


    // CALL FOR TABLE
    Route::get('/getAllAnimals' , [AnimalController::class , 'index']);
    Route::get('/getAllUsers', [UserController::class, 'index']);
    Route::get('/getAllTasksforTable', [TaskController::class, 'index']);
    Route::get('/getAllCages' , [CageController::class, 'index']);
});


// ROUTE OF COMPONENTS TABLE


// LOGOUT 
Route::get('/logout' , 'Laravel\Fortify\Http\Controllers\AuthenticatedSessionController@destroy');