<?php
namespace App\Controllers;
use App\View;
use App\Services\TaskDatabase;

class TaskController{

    public function index(){
        echo View::make('home-view', ['username'=>$_SESSION['username']]);
    }

    public function create(){
        echo View::make('create-view', ['username'=>$_SESSION['username']]);
    }

    public function add(){
        if(isset($_POST['add'])){
            $task = new TaskDatabase();
            $task->insert([$_SESSION['id'],$_POST['description']]);
            header("Location: /todo-list");
        }
    }

}