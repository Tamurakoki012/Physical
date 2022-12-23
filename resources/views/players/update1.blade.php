<?php
ini_set('display_errors', "On");
session_start();
if (isset($_POST["id"]) == true) {
  $id = htmlspecialchars($_POST["id"], ENT_QUOTES);
}
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
<script>
</script>

<body>
  <header>
    @include('players.header')
  </header>
  <main>
    <section>
      <div class="confirm">

        <div class="contact-text">
          <p>確認画面</p>
        </div>

            <form action="{{ url('update2') }}" method="post">
              {{csrf_field()}}
              <div class="form2">

                <label>Name</label>
                <p><?php echo $name; ?></p>

                <label>Email</label>
                <p><?php echo $email; ?></p>

              </div>
              <dd>
                <input type="submit" name="send" class="button22" value="編集">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="name" value="<?php echo $name; ?>">
                <input type="hidden" name="email" value="<?php echo $email; ?>">
              </dd>
          </div>
          </form>
          <div class="">
            <form action="{{ url('edit')}}" method="post">
              {{csrf_field()}}
              <input type="submit" name="back" class="button21" value="戻る">
              <input type="hidden" name="id" value="<?php echo $id; ?>">
              <input type="hidden" name="name" value="<?php echo $name; ?>">
              <input type="hidden" name="email" value="<?php echo $email; ?>">
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>
</body>

</html>