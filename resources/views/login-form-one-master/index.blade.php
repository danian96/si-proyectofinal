<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<meta charset="utf-8">
<title>Login Form Design One | Fazt</title>
<link rel="stylesheet" href="/css/master.css">
</head>
<body>

<div class="login-box">
    <img src="../login-form-one-master/img/logo.png" class="avatar" alt="Avatar Image">
    <h1>Login Here</h1>
    <form>
        <!-- USERNAME INPUT -->
        <label for="username">Username</label>
        <input type="text" placeholder="Enter Username">
        <!-- PASSWORD INPUT -->
        <label for="password">Password</label>
        <input type="password" placeholder="Enter Password">
        <input type="submit" value="Log In">
        <a href="#">Olvidaste tu contraseña?</a><br>

    </form>
</div>

   <!-- <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <style>
            body {
                background-image: url("https://www.mendozapost.com/files/image/125/125357/592e0f57b7d5f.jpg");
            }

        </style>
    <body>-->


    <script type="text/javascript" src="{{asset('js/materialize.js')}}"></script>
    </body>
</html>
