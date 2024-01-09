<?php session_start()?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <?php
        if(isset($_POST['hasAccount'])) $_COOKIE['hasAccount'] = true;
        if (isset($_POST['noAccount'])) unset($_COOKIE['hasAccount']);
    ?>

    <h2><?php if(isset($_SESSION['error'])) echo $_SESSION['error']?></h2>

    <?php if(isset($_SESSION['username']) or $_COOKIE['hasAccount']){?>
        <h2>Login</h2>
        <form action="vendor/auth.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="Login">
        </form>
        <form action="index.php" method="post">
            <input type="submit" name="noAccount" value="Do you want to create new account?">
        </form>
    <?php }else{?>
        <h2>Registration</h2>
        <form action="vendor/auth.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="Register">
        </form>
        <form action="index.php" method="post">
            <input type="submit" name="hasAccount" value="Already have an account?">
        </form>
    <?php }?>

</body>
</html>
<?php