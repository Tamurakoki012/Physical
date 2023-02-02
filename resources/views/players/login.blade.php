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
    <div class="top">
        @if (session('message'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
        @endif

        <div class="title">
            <h1>Physical fitness</h1>
        </div>

        <form class="login-form" action="login_cmplete" method="post" style="position:relative">
            @csrf

            @if ($errors->has('messagge'))
            <p style="color:red; text-align:center;  background-color: #fff;">{{$errors->first('messagge')}}</p>
            @endif

            @if ($errors->has('email'))
            <p style="color:red; text-align: center;   background-color: #fff;">{{$errors->first('email')}}</p>
            @endif
            <div class="mail">
                <input class="email" type="text" name="email" placeholder="Email"><br></input>
            </div>
            @if ($errors->has('password'))
            <p style="color:red; text-align: center;   background-color: #fff;">{{$errors->first('password')}}</p>
            @endif
            <div class="pas">
                <input class="email" type="password" name="password" placeholder="Password">
            </div>
            <input class="button" type="submit" name="login_cmplete" value="Login">
            <a class="button1" href="new" class="">Signup</a>
            
        </form>
    </div>
</body>