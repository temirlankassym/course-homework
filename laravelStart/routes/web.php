<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {return view('welcome');})->name('home');

Route::get('/register', function () {return view('auth.register');});

Route::get('/login', function () {return view('auth.login');});
Route::get('/logout',[AuthController::class,'logout']);

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

Route::get('/tasks', [TaskController::class,'show'])->middleware('auth');;
Route::post('/tasks',[TaskController::class,'create'])->middleware('auth');;;

Route::get('/history', [TaskController::class,'showHistory'])->middleware('auth');

Route::get('/completed/{id}',[TaskController::class,'completed'])->middleware('auth');
Route::get('/delete/{id}',[TaskController::class,'delete'])->middleware('auth');

Route::get('/api', [ApiController::class,'getApiData']);
