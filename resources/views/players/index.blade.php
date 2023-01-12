<?php
ini_set('display_errors', "On");
error_reporting(E_ALL);
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" name="csrf-token" content="{{ csrf_token() }}">
  <title></title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="{{asset('/css/index.css')}}" rel="stylesheet">
  <script src="{{asset('/js/cafe.js')}}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<body>

  <script>
    window.onload = function() {
      $('header').addClass('fade');
    };
  </script>


  <div class="home">
    @include("players.header")
    <div class="welcome">
      <p>Welcome:{{ Auth::user()->name }}</p>
    </div>
    @can('user-higher')
    <div class="main-nav">
      <div class="animation_box">
        <a href="target">TARGET<br></a>
      </div>
      <div class="animation_box2">
        <a href="mypage">MYPAGE<br></a>
      </div>
      <div class="animation_box3">
        <a href="outcome">ACHIEVEMENT<br></a>
      </div>
      <div class="animation_box4">
        <a href="cha">COMMUNITY<br></a>
      </div>
    </div>
    @endcan
    @can('admin-higher'){{-- 管理者に表示される --}}
    <div class="manager-main">
      <a href="manager_list" class="">管理者</a>
    </div>
    @endcan
  </div>
</body>

</html>