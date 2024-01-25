<?php
session_start();
require 'vendor/autoload.php';

use App\Controllers\Route;
use App\Controllers\TaskController;
use App\Controllers\UserController;

$router = new Route();
$router -> register('/',[UserController::class,'index']);
$router -> register('/register',[UserController::class,'register']);
$router -> register('/login',[UserController::class,'login']);
$router -> register('/logout',[UserController::class,'logout']);

$router -> register('/todo-list',[TaskController::class,'index']);
$router -> register('/create',[TaskController::class,'create']);
$router -> register('/add',[TaskController::class,'add']);

$router->resolve($_SERVER['REQUEST_URI']);