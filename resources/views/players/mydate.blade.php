<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="{{asset('/css/index.css')}}" rel="stylesheet">
    <script src="{{asset('/js/test.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <header>
        @include("players.header_user")
    </header>

    <div class="deliver">
        <p>お届け先情報</p>
    </div>
    @if (session('flash_message'))
    <div class="flash_message">
        {{ session('flash_message') }}
    </div>
    @endif

    <form class="mydate_setting" action="mydate_store" method="post">
        @csrf
        <div class="user_date_name">
            <label>名前</label>
            <input type="text" name="user_name" placeholder="（例）山田太郎">
        </div>
        <div class="user_date_tell">
            <label>電話番号</label>
            <input type="text" name="user_tell" placeholder="090-1234-5678">
        </div>
        <div class="post">
            <label>郵便番号</label>
            <input type="text" name="post" placeholder="123-4567">
        </div>
        <div class="prefectures">
            <label>都道府県</label>
            <select type="text" name="prefectures">
                @foreach(config('pref') as $key => $score)
                <option value="{{ $score }}">{{ $score }}</option>
                @endforeach
            </select>
        </div>
        <div class="municipality">
            <label>市区町村</label>
            <input type="text" name="municipality">
        </div>
        <div class="address">
            <label>番地</label>
            <input type="text" name="address">
        </div>
        <div class="building">
            <label>建物名・部屋番号（任意）</label>
            <input type="text" name="building">
        </div>

        <button type="submit" class="btn btn-success">
            {{ __('登録') }}
        </button>
    </form>
    <script>
        $(".close_nav").on("click", function() {
            $(".header-mypage-nav").removeClass("open");
        });
        $(".close_nav").on("click", function() {
            $(".hamburger").removeClass("active");
        });
    </script>
</body>