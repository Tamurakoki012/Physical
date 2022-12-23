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

<body>
  <script>
  </script>

  @include('players.header')

  <div class="delete">
    <div class="delete-text">
      <h3>削除完了</h3>
      <p>削除完了しました</p>

      <div class="deleteback">
        <a href="manager_list">データ一覧へ戻る</a>
      </div>
    </div>
  </div>
</body>
</html>