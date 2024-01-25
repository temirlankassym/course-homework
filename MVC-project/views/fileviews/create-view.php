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
    <h2>New Task</h2>
    <form action="/add" method="post">
        <input type="text" name="description">
        <input type="submit" name='add' value="Add">
    </form>
</body>
</html>