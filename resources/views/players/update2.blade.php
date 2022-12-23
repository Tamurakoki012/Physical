<?php
ini_set('display_errors', "On");
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title></title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="{{asset('/css/index.css')}}" rel="stylesheet">
  <script src="{{asset('/js/cafe.js')}}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<script>
</script>

<body>
  <header>
    @include('players.header')
  </header>
  <main>
    <section>
      <div class="update2">
        <div class="update2-text">
          <p>編集完了</p>
        </div>
 
          <div class="back">
            <a href="manager_list">トップへ戻る</a>
          </div>
 
      </div>
    </section>
  </main>
</body>

</html>