<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDo List</title>
    <link rel="stylesheet" href="app/style.css">
</head>
<body>
<?php if(isset($_SESSION['error'])) echo $_SESSION['error']?>
<form action="/register" method="post">
    <h2>Register</h2>
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" name="register">
</form>
<form action="/login" method="post">
    <h2>Login</h2>
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" name="login">
</form>
</body>
</html>