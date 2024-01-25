<?php
namespace App\Controllers;
use App\View;
use App\Services\UserDatabase;

class UserController{
    public function index(){
        echo View::make('main-view', ['username'=>$_SESSION['username']]);
    }

    public function register(){
        if(isset($_POST['register'])){
            $db = new UserDatabase();
            $db->insert('"'.$_POST['username'].'","'.$_POST['password'].'"');
            $_SESSION['username'] = $_POST['username'];
            unset($_SESSION['error']);
            header("Location: /");
        }
    }

    public function login(){
        if(isset($_POST['login'])){
            $db = new UserDatabase();
            if($db->validate($_POST['username'],$_POST['password'])){
                $_SESSION['id'] = $db->getId($_POST['username']);
                $_SESSION['username'] = $_POST['username'];
                unset($_SESSION['error']);
                header('Location: /todo-list');
            }
            else{
                $_SESSION['error'] = "Invalid username or password";
                header("Location: /");
            }
        }
    }

    public function logout(){
        session_destroy();
        header("Location: /");
    }
}