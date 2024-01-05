<?php
session_start();
require_once 'services/Database.php';

$db = new Database();
$db->validate($_POST['username'],$_POST['password']);
$_SESSION['username'] = $_POST['username'];