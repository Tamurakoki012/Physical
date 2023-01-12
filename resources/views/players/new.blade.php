<?php
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
        $(function() {
            $(".button2").click(function() {
                var error;
                var error_result = new Array();
                if ($(".validate_name").val() === "" || $(".validate_name").val().length > 10) {
                    var error = 1;
                    error_result.push("氏名は必須入力です。");
                }
                if ($(".validate_mail").val() === "") {
                    var error = 1;
                    error_result.push("メールアドレスは正しくご入力ください。");
                } else if (!$(".validate_mail").val().match(/^[0-9a-z_.\/?-]+@([0-9a-zz]+\.)+[0-9a-z-]+$/)) {
                    var error = 1;
                    error_result.push("メールアドレスは正しくご入力ください。");
                }
                if ($(".validate_password").val() === "") {
                    var error = 1;
                    error_result.push("パスワードは必須入力です。");
                }
            });
        });
    </script>
    <div class="top_new">
        <div class="title">
            <h1>Physical fitness</h1>
        </div>

        <form class="login-form" action="confirm" method="post">
            @csrf

            <div class="user_name">
                <input class="email" type="text" name="name" placeholder="User Name"><br></input>
                @if ($errors->has('name'))
                <p style="color:red; text-align:center;">{{$errors->first('name')}}</p>
                @endif
            </div>

            <div class="mail">
                <input class="email" type="text" name="email" placeholder="Email"><br></input>
                @if ($errors->has('email'))
                <p style="color:red;text-align:center;"> {{$errors->first('email')}}</p>
                @endif
            </div>

            <div class="pas">
                <input class="email" type="text" name="password" placeholder="Password"></input><br>
                @if ($errors->has('password'))
                <p style="color:red; text-align: center;">{{$errors->first('password')}}</p>
                @endif
            </div>
            <div class="new_button">
                <input class="button_register" type="submit" name="confirm" value="Register">
                <a class="button_back" href="login" class="">Back</a>
            </div>
        </form>
    </div>
</body>