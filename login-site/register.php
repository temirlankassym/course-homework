<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <h2>Registration</h2>
    <form action="register.php" method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" name="Register">
    </form>
</body>
</html>
<?php
require_once 'services/Database.php';

if(isset($_POST['Register'])){
    $db = new Database();
    $db->createUser($_POST['username'],$_POST['password']);
    unset($_SESSION['error']);
    return header("Location: index.php");
}