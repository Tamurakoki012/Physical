<?php
ini_set('display_errors', "On");
if (isset($_POST["name"]) == true) {
  $name = htmlspecialchars($_POST["name"], ENT_QUOTES);
} else {
  $name = "";
}
if (isset($_POST["email"]) == true) {
  $email = htmlspecialchars($_POST["email"], ENT_QUOTES);
} else {
  $email = "";
}
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

<body>
  <script>
  </script>

  <div class="sub_header">
    @include('players.header')
  </div>

  
    <div class="contact-text">
      <p>編集画面</p>
    </div>
    <div class="edit">
    <div class="push">
      <p class="push-text">a下記の項目を編集の上編集ボタンを押してください</p>
      <p><span>*</span>は必要項目となります。</p>
    </div>

    <form action="{{ url( 'update1' )}}" method="post">
      {{csrf_field()}}
      <div class="form1">
        @CSRF
        <label>氏名<span>*</span><br></label>
        @if ($errors->has('name'))
        <p class="error_list">{{$errors->first('name')}}</p>
        @endif
        <input class="name2" type="text" name="name" value="{{ old('name') }}<?php if (!empty($_POST["name"])) {
                                                                                                  echo $name;
                                                                                                } ?>"><br></input>

        <label>メールアドレス<span>*</span><br></label>
        @if ($errors->has('email'))
        <p class="error_list">{{$errors->first('email')}}</p>
        @endif
        <input class="email1" type="text" name="email" value="{{ old('email') }}<?php if (!empty($_POST["email"])) {
                                                                                  echo $email;
                                                                                } ?>">

        <input class="button21" type="submit" name="update1" value="編集">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
      </div>
    </form>

    <div class="back">
      <a href="manager_list">データ一覧へ戻る</a>
    </div>
  </div>
</body>

</html>