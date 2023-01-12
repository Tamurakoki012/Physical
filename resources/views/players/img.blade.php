<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>newsite</title>
<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="wrapper">
    <div class="header1"><h1>投稿ページ</h1></div>
    <div class="content_wrapper">
    <div class="content2">
        <form action="/newimgsend" method="post" enctype="multipart/form-data">
        <!-- ファイルをフォームに投稿する際必須 ＋　newwimgsendに飛ばされルーティングでsaveimgクラスの値が適応-->
            @csrf            
            <p>&nbsp;</p>
            <p>画像をアップロード</p>
            <input type="file" name="post_img">    
            <!-- ファイル選択ボタン -->        
            <p>&nbsp;</p>
            <input type="submit" class="submitbtn">
            ssssssssaaaaaa
        </form>    
    </div>
    </div>
    </div>
</body>
</html>