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
</head>

<body>

  <script>
    window.onload = function() {
      $('header').addClass('fade');
    };

  </script>

  @include("players.header")
  @if (session('successMessage'))
  <div class="alert alert-success text-center">
    {{ session('successMessage') }}
  </div>
  @endif

  <div class="home">
    <div class="welcome">
      <p>Welcome:{{ Auth::user()->name }}</p>
    </div>
    @can('user-higher')
    <div class="main-nav">
      <div class="animation_box">
        <a href="target">TARGET/<a href="mypage">MYPAGE/<br><a href="outcome">ACHIEVEMENT/<a href="cha">COMMUNITY<br></a></a></a></a>
        <div class="main-img">
          <a href="logout"><img src="./img/Physical2.png"></a>
        </div>
      </div>
    </div>
    @endcan
    @can('admin-higher'){{-- 管理者に表示される --}}
      <div class="manager-main">
        <a href="manager_list" class="">管理者</a>
        <a href="manager_list" class="">管理者</a>
      </div>
      @endcan
  </div>
</body>

</html>