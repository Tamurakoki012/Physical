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

    <div class="top-img2">
        <img src="./img/key.jpg">
    </div>

    <div class="title2">
        <h1>Physical fitness</h1>
    </div>

    <form class="" action="manager_list" method="post">
        @csrf

        @if ($errors->has('messagge'))
        <p style="color:red;position:absolute;bottom:530px;right:600px;">{{$errors->first('messagge')}}</p>
        @endif
        <div class="from">
            

            @if ($errors->has('email'))
            <p style="color:red;">{{$errors->first('email')}}</p>
            @endif
            <div class="mail">
                <label>Email</label>
                <input class="email" type="text" name="email" value="<?php if (!empty($_POST["email"])) {
                                                                            echo htmlspecialchars($_POST["email"]);
                                                                        } ?>"><br></input>
            </div>

            @if ($errors->has('password'))
            <p style="color:red;">{{$errors->first('password')}}</p>
            @endif
            <div class="pas">
                <label for="password">Password</label>
                <input type="password" name="password">
            </div>

            <div class="">
                <input class="button" type="submit" required name="manager_list" value="ログイン">
            </div>

            <div class="">
                <a class="button6" href="index" class="">戻る</a>
            </div>
        </div>
    </form>
</body>