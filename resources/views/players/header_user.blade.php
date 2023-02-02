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
<script>
    $(function() {
        $('.hamburger').click(function() {
            $('.hamburger').toggleClass('active');
            $('.header-mypage-nav').toggleClass('open');
        });
    });
    $(".close_nav").on("click", function() {
        $(".header-mypage-nav").removeClass("open");
    });
    $(".close_nav").on("click", function() {
        $(".hamburger").removeClass("active");
    });
</script>

<body>
    <header>
        <div id="header-mypage">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="header-mypage-nav">
                <li><a href="index">Top</a></li>
                <li><a href="target">Target</a></li>
                <li><a href="outcome">Achivement</a></li>
                <li><a href="cha">Community</a></li>
                <li><a href="mypage">Mypage</a></li>
                <li><a href="logout">Logout</a></li>
                <li class="close_nav">Close</li>
            </div>
            <div class="header_img">
                <img src="./img/cc.jpeg" alt="">
                <div class="my_date">
                    <li><a href="mydate">ユーザー設定</a></li>
                    <li><a href="profile">プロフィール</a></li>
                </div>
            </div>
        </div>
    </header>
</body>

</html>