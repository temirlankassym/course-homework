<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {return view('welcome');})->name('home');

Route::get('/register', function () {return view('auth.register');});
Route::get('/login', function () {return view('auth.login');});
Route::get('/logout',[AuthController::class,'logout']);

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

Route::middleware(['auth'])->group(function (){
    Route::get('/tasks', [TaskController::class,'show']);
    Route::post('/tasks',[TaskController::class,'create']);

    Route::get('/completed', [TaskController::class, 'showCompletedTasks']);
    Route::get('/completed/{id}',[TaskController::class,'complete']);
    Route::get('/delete/{id}',[TaskController::class,'delete']);
});
