<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="{{asset('/css/index.css')}}" rel="stylesheet">
    <script src="{{asset('/js/chat.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>ssss
    <script>
        $(function() {
            let carUl = $('.carousel > ul');
            $('.carousel > span').on('click', function() {
                if ($(this).hasClass('prev')) {
                    carUl.animate({
                        'margin-left': '-100%'
                    }, 1000, function() {
                        carUl.css('margin-left', '0');
                        carUl.append($('.carousel > ul > li:first-child'));
                    });
                } else {
                    carUl.prepend($('.carousel > ul > li:last-child'));
                    carUl.css('margin-left', '-100%');
                    carUl.animate({
                        'margin-left': '0'
                    }, 1000);
                }
            });
            // 自動実行
            setInterval(function() {
                $('.carousel > span.next').click();
            }, 3000);
        });
    </script>
    <!-- header -->
    <header>
        <h1>Carousel Slider</h1>
        <p>center line<br>↓</p>
    </header>
    <!-- carousel slider -->
    <div class="carousel">
        <ul>
            <li><img src="./img/jogging.jpg"></li>
            <li><img src="./img/key.jpg"></li>
            <li><img src="./img/jogging.jpg"></li>
        </ul>
        <!-- prev next button -->
        <span class="prev">←</span>
        <span class="next">→</span>
    </div>
    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- Original JS -->
    <script src="./js/main.js"></script>
</body>

</html>