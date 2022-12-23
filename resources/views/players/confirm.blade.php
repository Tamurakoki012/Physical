<?php
ini_set('display_errors', "On");
session_start();
$_SESSION['name'] = $_POST["name"];
$_SESSION['email'] = $_POST["email"];
$_SESSION['password'] = $_POST["password"];
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

    <div class="confirm">

        <div class="confirm-text">
            <p>ご確認ください</p>
        </div>

        <div class="push">
            <div class="push-text">
                <p>下記の内容をご確認の上、登録ボタンを押してください<br></p>
                <p>内容を訂正する場合は「戻る」を押してください。</p>
            </div>
            <form action="{{ url('complete') }}" method="post">
                @csrf
                <div class="form2">
                    <label>氏名</label>
                    <p><?php echo htmlspecialchars($_SESSION["name"], ENT_QUOTES); ?></p>

                    <label>メールアドレス</label>
                    <p><?php echo htmlspecialchars($_SESSION["email"], ENT_QUOTES); ?></p>

                    <label>パスワード</label>
                    <p><?php echo nl2br(htmlspecialchars($_SESSION["password"], ENT_QUOTES)); ?></p>
                </div>
                <div class="">
                    @csrf
                    <input type="submit" name="send" class="button10" value="登録">
                    <input type="hidden" name="send" value="send">
                    <input type="hidden" name="name" value="<?php echo htmlspecialchars($_SESSION["name"], ENT_QUOTES); ?>">
                    <input type="hidden" name="email" value="<?php echo htmlspecialchars($_SESSION["email"], ENT_QUOTES); ?>">
                    <input type="hidden" name="password" value="<?php echo htmlspecialchars($_SESSION["password"], ENT_QUOTES);  ?>">
                </div>
            </form>
            <div class="">
                <form action="{{ url('new') }}" method="post">
                    @csrf
                    <input type="submit" name="back" class="button11" value="戻る">
                    <input type="hidden" name="back" value="back">
                    <input type="hidden" name="name" value="<?php echo htmlspecialchars($_SESSION["name"], ENT_QUOTES); ?>">
                    <input type="hidden" name="email" value="<?php echo htmlspecialchars($_SESSION["email"], ENT_QUOTES); ?>">
                    <input type="hidden" name="password" value="<?php echo htmlspecialchars($_SESSION["password"], ENT_QUOTES);  ?>">
                </form>
            </div>
        </div>
    </div>
</body>