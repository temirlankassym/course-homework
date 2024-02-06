<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <style>
        body {font-size: 20px ;flex-direction: row;font-family: sans-serif;display: flex;justify-content: center;align-items: center;height: 100vh;}
        a {text-decoration: none; color: #1a202c}
    </style>
</head>
<body>
    <div style="background-color: #0073c3; width: 500px;height: 500px;justify-content: center;display: flex;align-items: center;">

        <form action="/login" method="post" style="padding-top:0px;width: 300px;display: flex; flex-direction: column; gap: 10px;">
            @csrf
            <h1>Login</h1>
            <input style="border-width: 0px;height: 30px" type="text" name="email" placeholder="email">
            <input style="border-width: 0px;margin-top:5px;height: 30px" type="password" name="password" placeholder="password">
            <button style="margin-top: 40px; width: 100px" class="btn btn-primary" type="submit">Login</button>
            @if(isset($error))
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endif
        </form>
    </div>
</body>
</html>
