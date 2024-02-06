<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-Do List</title>
    <style>
        body{color:#333;font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;display:flex;justify-content:center;align-items:center;height:100vh;margin:0}#content{background-color:#0073c3;padding:20px;border-radius:10px;text-align:center}#weather-info{background-color:#006f43;margin-top:-20px;margin-bottom:10px;padding:10px;line-height:2;border-bottom-left-radius:10%;border-bottom-right-radius:10%}#logout-btn,#history-btn{border:0;background-color:white;width:120px;height:30px;text-align:center;margin:10px;cursor:pointer}h1{color:white}p{color:#333;margin:10px 0}a{text-decoration:none;color:#20144c}hr{margin-bottom:20px;width:400px;border:0;height:1px;background-color:#ddd}form{display:flex;justify-content:center;align-items:center;margin-bottom:20px}input[type="text"]{padding:10px;margin-right:10px;border:1px solid #ddd;border-radius:5px;outline:none}.btn-primary{background-color:#0073c3;color:white;border:0;padding:10px 20px;border-radius:5px;cursor:pointer}.task-container{display:flex;align-items:center;margin-bottom:10px;padding:10px;background-color:#fff;border-radius:5px;position:relative}.done-btn,.delete-btn{background-color:#4CAF50;color:white;border:0;height:30px;border-radius:5px;cursor:pointer;position:absolute}.done-btn{width:60px;right:80px}.delete-btn{width:60px;right:10px}.delete-btn{background-color:#840000;margin-left:10px}
    </style>
</head>
<body>
<div id="content">
    <div id="weather-info" style="color: white">
        <strong>Weather in Almaty</strong>
        <br>
        Temperature: {{$weather['current']['temp_c']}}
        <br>
        Feels Like: {{$weather['current']['feelslike_c']}}
        <br>
        Wind: {{$weather['current']['wind_kph']}}
    </div>
    <button id="logout-btn"><a href="/logout">Logout</a></button>
    <button id="history-btn"><a href="/completed">Completed Tasks</a></button>
    <h1>Hello {{auth()->user()->username}}</h1>
    <p style="color: white">Add new Task</p>
    <hr>
    <form action="/tasks" method="post">
        @csrf
        <input type="text" name="title" placeholder="Enter task title">
        <button style="background-color: #3a1076" class="btn-primary" type="submit">Add</button>
    </form>
    @if(isset($tasks))
        @foreach($tasks as $task)
            <div class="task-container">
                <p>{{$task->title}}</p>
                <button class="done-btn"><a href="/completed/{{$task->id}}" style="color:white;">Done</a></button>
                <button class="delete-btn"><a href="/delete/{{$task->id}}" style="color:white">Delete</a></button>
            </div>
        @endforeach
    @endif
</div>
</body>

</html>
