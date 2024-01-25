<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../app/style.css">
    <title>ToDo List</title>
</head>
<body>
    <h1>ToDo List</h1>
    <h2><?="Hello ".$this->params['username']?></h2>
    <hr>
    <?php
        use App\Services\TaskDatabase;

        $task = new TaskDatabase();
        $tasks = $task->getTasks($_SESSION['id']);
        foreach ($tasks as $task){
            echo "<p>$task[task]</p>";
        }
    ?>
    <a href="/create">Add new task</a>
    <br>
    <a href="/logout">Logout</a>
</body>
</html>