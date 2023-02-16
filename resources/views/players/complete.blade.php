<?php
ini_set('display_errors', "On");
error_reporting(E_ALL);
session_start();
session_destroy();
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

  @include("players.header")

  <div class="top-img">
    <img src="./img/5278.jpg">
  </div>

  <div class="complete-text">
    <p>登録完了</p>
  </div>

  <div class="complete-text2">
    <p> Physical fitnessにご登録頂きありがとうございます。<br></p>
  </div>
  <div class="complete-text3">
    <p>これから一緒に頑張っていきましょう！！</p>
  </div>


  <div class="button3">
    <a href="login" class="">トップへ戻る</a>
  </div>
zzzzz
  </div>
</body>

</html>