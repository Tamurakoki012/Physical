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
    window.onload = function() {
      $('header').addClass('fade');
    };
  </script>
  <header>

    <div id="header1">
      <div class="logo">
        <a href="index"><img src="./img/fitness.png"></a>
      </div>

      <div class="header_nav">
        <a href="logout">Logout<br></a>
      </div>
    </div>
  </header>
</body>

</html>