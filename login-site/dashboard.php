<?php session_start()?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome <?=$_SESSION['username']?></h2>
    <form action="dashboard.php" method="post">
        <input type="submit" name="logout" value="Logout">
    </form>
    <?php if(isset($_POST['logout'])){
        session_destroy();
        header("Location: index.php");
    }?>
</body>
</html>
<?php