<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-Do List</title>
    <style>
        body {color:black;flex-direction: column;font-family: sans-serif;display: flex;justify-content: center;align-items: center;height: 100vh;margin: 0}
        a {text-decoration: none; color: #1a202c}
        #content{text-align: center; color: white}
    </style>
</head>
<body>
<div id="content" style="width: 300px;background-color: #0073c3; padding-top: 20px;padding-bottom: 20px">
    <button style="border-width:0;background-color: white;width: 70px;height: 25px;text-align: center"><a href="/tasks">Return</a></button>
    <h1>Completed Tasks</h1>
    @if(isset($tasks))
        @foreach($tasks as $task)
            <div>
                <p>{{$task->title}}</p>
                <hr style="width: 100px">
                </div>
        @endforeach
    @endif
</div>
    </div>
</body>
</html>
