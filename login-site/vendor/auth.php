<?php
session_start();
require_once '../services/Database.php';

if(isset($_POST['Login'])){
    $db = new Database();
    if($db->validate($_POST['username'],$_POST['password'])){
        $_SESSION['username'] = $_POST['username'];
        return header("Location: ../dashboard.php");
    }
    return header("Location: ../index.php");
}

if(isset($_POST['Register'])){
    $db = new Database();
    $db->createUser($_POST['username'],$_POST['password']);
    $_SESSION['username'] = $_POST['username'];
    unset($_SESSION['error']);
    return header("Location: ../index.php");
}