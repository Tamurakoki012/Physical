<body>
   
 <style>
   /* 線の色の変更 */
   .epoch .category1 .line {
     stroke: #dc3545;
   }

   .epoch .category2 .line {
     stroke: #17a2b8;
   }
</style>
<div class="container">
    <h1 class="text-center">現在の気温・湿度</h1>
    <div class="row">
        <div class="mx-auto">
            <p>
                気温：<img width="40" height="20" class="bg-danger">　
                湿度：<img width="40" height="20" class="bg-info">
            </p>
        </div>
        <div id="myChart" class="epoch" style="width: 100%; height: 200px">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <form>
                <div class="form-group">
                    <label for="temperature">気温（-15℃～３５℃）</label>
                    <input id="temperature" type="range" class="form-control-range" min="-15" max="35" value="20">
                </div>
                <div class="form-group">
                    <label for="humidity">湿度（０％～１００％）</label>
                    <input id="humidity" type="range" class="form-control-range" min="0" max="100">
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/locale/ja.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.3.13/d3.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/epoch/0.8.4/js/epoch.min.js"></script>
<script>
          // データ範囲 左右別
    var leftRange = [-20, 40];
    var rightRange = [-5, 105];
    // 初期データ
    var data = [
            {
                label: "layer1",
                range: leftRange,
                values: [],
            },
            {
                label: "layer2",
                range: rightRange,
                values: [],
            }
        ]
    ;
    // 初期化
    let chart = $('#myChart').epoch({
        type: 'time.line',                         //グラフの種類
        data: data,                                  //初期値
        axes: ['bottom', 'left', 'right'],       //利用軸の選択
        fps: 24,                                     //フレームレート
        range: {                                     //軸の範囲
            left: leftRange,
            right: rightRange
        },
        queueSize: 1,   // キューサイズ ※push時、キューからあふれたデータは破棄される
        windowSize: 20, // 表示から見切れるまでいくつデータを表示させるか

        // 目盛りの設定。 timeは間隔秒数、他は目盛りの数
        ticks: {time: 5, right: 5, left: 5},
        // 目盛りの書式
        tickFormats: {
            bottom: function (d) {
                return moment(d * 1000).format('HH:mm:ss');
            },
            left: function (d) {
                return (d).toFixed(1) + " ℃";
            },
            right: function (d) {
                return (d).toFixed(0) + " %";
            }

        }
    });

    // リアルタイム表示処理
    setInterval(function () {
        chart.push(
            [
                {time: Date.now() / 1000, y: $("#temperature")[0].value,},
                {time: Date.now() / 1000, y: $("#humidity")[0].value,},
            ],
        );
    }, 1000);
        </script>
</body>
</html>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<title>デモ | ビットコイン/円(BTC/JPY)リアルタイムレートを作成してみた</title>
<meta name="description" content="" />
<link rel="stylesheet" href="/demo/common/css/common.css" />
<link rel="stylesheet" href="css/style.css" />
<!-- Chart.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-streaming@latest/dist/chartjs-plugin-streaming.min.js"></script>
<!-- Chart.js -->
</head>
<body>
    <!-- contents start -->
    <div class="container">
        <section class="section_mb section_mt">
            <div class="inner">
                <h2>デモ | ビットコイン/円(BTC/JPY)リアルタイムレートを作成してみた</h2>
                <h3></h3>
                <div class="graph_box">
                    <canvas id="btc_jpy"></canvas>
                </div>
            </div>
        </section>
    </div>
    <!-- contents end -->
    </div>
<script src="js/graph02.js"></script>
</body>
</html>
<script>
// WebSocket
var sock = new WebSocket('wss://ws.lightstream.bitflyer.com/json-rpc');
var sock_params = [{
    "method": "subscribe",
    "params": {
        "channel": "lightning_executions_BTC_JPY",
    }
}];
// Websocket message格納用配列
var sock_results = {
    'result': []
}
 
// Websocket 接続
sock.addEventListener('open', function (e) {
    sock.send(JSON.stringify(sock_params));
});
 
// Websocket message受信
sock.addEventListener('message', function (e) {
    data = JSON.parse(e.data)['params'];
    message = data['message'];
    // priceを配列に格納
    sock_results['result']['btc_jpy'] = parseInt(message[message.length - 1]['price'])
});
 
// Chart.js
ctx_btc_jpy = document.getElementById('btc_jpy').getContext('2d');
 
chart_btc_jpy = new Chart(ctx_btc_jpy, {
    type: 'line',
    data: {
        datasets: [{
            label: 'BTC/JPY',
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgb(255, 99, 132)',
            data: []
        }]
    },
    options: {
        scales: {
            xAxes: [{
                type: 'realtime',
                realtime: {
                    duration: 20000,
                    refresh: 1000, // デフォルト
                    delay: 1000,
                    frameRate: 30, // デフォルト
                    onRefresh: function (chart) {
                        chart_btc_jpy.data.datasets.forEach(function (v, i, datasets) {
                            datasets[i].data.push({
                                x: Date.now(),
                                y: sock_results['result']['btc_jpy']
                            });
                        });
                    }
                }
            }]
        }
    }
});
</script>
