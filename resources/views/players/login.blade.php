<?php
ini_set('display_errors', "On");
error_reporting(E_ALL);
session_start();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="{{asset('/css/index.css')}}" rel="stylesheet">
    <script src="{{asset('/js/cafe.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>

    <script>
    </script>

    <header>
    </header>

    <div class="top-img">
        <img src="./img/jogging.jpg">
    </div>

    <div class="title">
        <h1>Physical fitness</h1>
    </div>

    <form class="" action="login_cmplete" method="post">
        @csrf

        @if ($errors->has('messagge'))
        <p style="color:red;position:absolute;bottom:530px;right:600px;">{{$errors->first('messagge')}}</p>
        @endif
        <div class="from">

            @if ($errors->has('email'))
            <p style="color:red;position: absolute;bottom:450px;">{{$errors->first('email')}}</p>
            @endif
            <div class="mail">
                <label>Email</label>
                <input class="email" type="text" name="email" value="<?php if (!empty($_POST["email"])) {
                                                                            echo htmlspecialchars($_POST["email"]);
                                                                        } ?>"><br></input>
            </div>
            @if ($errors->has('password'))
            <p style="color:red;;position:absolute;bottom:370px;">{{$errors->first('password')}}</p>
            @endif
            <div class="pas">
                <label for="password">Password</label>
                <input type="password" name="password">
            </div>

            <div class="">
                <input class="button" type="submit" name="login_cmplete" value="ログイン">
            </div>

            <div class="button1">
                <a href="new" class="">新規登録</a>
            </div>
        
        </div>
    </form>
</body>