<?php

use Illuminate\Support\Facades\Auth;

function db_connect()
{
  try {
    $pdo = new PDO(
      'mysql:dbname=training;charset=utf8;host=localhost',
      'root',
      'root',
      [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      ]
    );
  } catch (PDOException $e) {
    exit('DBConnectError:' . $e->getMessage());
  }
  return $pdo;
}

$pdo = db_connect();
$id = Auth::id();
$sum = '';
$sum2 = '';
$sum3 = '';

$stmt = $pdo->prepare("SELECT *FROM achievement INNER JOIN users ON users.id = achievement.user_id WHERE user_id = $id");
$status = $stmt->execute();

while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {

  $sum = $sum . '"' . $r['today_record'] . '",';
  $sum2 = $sum2 . '"' . $r['today_record2'] . '",';
  $sum3 = $sum3 . '"' . $r['today_record3'] . '",';
}

$sum = trim($sum, ",");
?>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1"></script>
<script>
  $i = 1;
  window.onload = function() {
    let context = document.querySelector("#sums").getContext('2d')
    new Chart(context, {
      type: 'line',
      data: {
        labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31', ],
        datasets: [{
            label: "記録1",
            data: [<?php echo $sum ?>],
            borderColor: '#F00',
            backgroundColor: '#F00',
          },
          {
            label: "記録2",
            data: [<?php echo $sum2 ?>],
            borderColor: 'black',
            backgroundColor: 'black',
          },
          {
            label: "記録3",
            data: [<?php echo $sum3 ?>],
            borderColor: '#FF0',
            backgroundColor: '#FF0',
          },

        ],
      },
      options: {
        maintainAspectRatio: false,
        scales: {
          yAxes: {
            ticks: {
              stepSize: 1,
              callback: function(value, index, values) {
                return value + '回,km,時間'
              }
            }
          },
        }
      }
    })
    $('header').addClass('fade');

    $(function() {
      $('.hamburger').click(function() {
        $('.hamburger').toggleClass('active');
        $('.header-mypage-nav').toggleClass('open');
      });
    });
  };

  drawChart();
</script>
</head>

<body>
  <div class="my_page">
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

    <div class="mypagetitle">
      <h2>Mypage</h2>
    </div>
    
    <div class="container">
      <a href="#" class="btn-box">User</a>
      <div class="user">
        <h3>Name:{{ Auth::user()->name }}</h3>
        <p>Email:{{ Auth::user()->email }}</p>
        <a href="password" class="close">Pssword reset</a><br>
        <a href="#" class="close">Close</a>
      </div>
    </div>

    <div class="my_page_back">
      <a href="index" class="">トップへ戻る</a>
    </div>

    <div class="my_page_inner">
      <div class="bar">
        <canvas id="sums"></canvas>
      </div>

      <div class="target-table">
        <div class="user-target-o">
          <div class="user_targettext">
            <h4>Traget</h4>

            <div class="todays2">
              <a href="#"></a>
            </div>
          </div>
          <div class="user-targetdata">
            <a href="#" class="close2">Close</a>
            <table>
              @if($target_start > $target_end)
              @foreach ($target as $get)
              <tr>
                <td>
                  <p>{{$get->deadline}}</p>
                </td>
              </tr>
              <tr>
                <td>
                  <p class="user_target_list"><span>開始期間</span>:{{$get->target_start}}<span>終了期間</span>:{{$get->target_end}}</p>
                  <p class="user_target_list"><span>登録日</span>:{{$get->created_at}}</p>
                  <p class="user_target_list"><span>経過日数</span>:{{$diff_day}}日目</p>
                  <p class="user_target_list"><span>目標日数</span>:{{$get->target_num}}日間</p>
                </td>
              </tr>
              <tr>
                <td>
                  <p class="user_target_list"><span>目標体重</span>:{{$get->target_weight}}kg</p>
                </td>
              </tr>
              <tr>
                <td>
                  <p class="user_target_list"><span>Menu1</span>:{{$get->exercise_name}}{{$get->exercise_record}}{{$get->unit}}</p>
                </td>
              </tr>
              <tr>
                <td>
                  <p class="user_target_list"><span>Menu2</span>:{{$get->exercise_name2}}{{$get->exercise_record2}}{{$get->unit2}}</p>
                </td>
              </tr>
              <tr>
                <td>
                  <p class="user_target_list_menu3"><span>Menu3</span>:{{$get->exercise_name3}}{{$get->exercise_record3}}{{$get->unit3}}</p>
                </td>
              </tr>
              @endforeach
              @endif
            </table>
          </div>
        </div>
        <div class="todays-table">
          <div class="user-target-t">
            <div class="today-text">
              <h4>Achivement</h4>
              <div class="todays">
                <a href="#"></a>
              </div>
            </div>
            <div class="user-data">
              <table>
                @foreach ($achievement as $stock)
                <tr>
                  <td>
                    <p>{{$stock->deadline}}</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p class="user_target_list"><span>登録日</span>:{{$stock->created_at}}</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p class="user_target_list"><span>Menu1</span>:{{$stock->today_exercise}}{{$stock->today_record}}{{$stock->unit}}</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p class="user_target_list"><span>Menu2</span>:{{$stock->today_exercise2}}{{$stock->today_record2}}{{$stock->unit2}}</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p class="user_target_list_menu3"><span>Menu3</span>:{{$stock->today_exercise3}}{{$stock->today_record3}}{{$stock->unit3}}</p>
                  </td>
                </tr>
                @endforeach
                <a href="#" class="close3">Close</a>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="twitter">
      <a href="https://twitter.com/intent/tweet?url=シェアさせたい記事のURL&text=タイトルとか" target="blank_">
        <img src="./img/twitter.png" alt="">
      </a>
      <a href="https://twitter.com/intent/tweet?url=シェアさせたい記事のURL&text=タイトルとか" target="blank_">
        <img src="./img/twitter.png" alt="">
      </a>
      <a href="https://twitter.com/intent/tweet?url=シェアさせたい記事のURL&text=タイトルとか" target="blank_">
        <img src="./img/twitter.png" alt="">
      </a>
    </div>
  </div>
</body>
<script>
  $(".btn-box").on("click", function() {
    $(".user").addClass("active");
  });

  $(".close").on("click", function() {
    $(".user").removeClass("active");
  });

  $(".todays").on("click", function() {
    $(".user-data").addClass("active");
  });
  $(".todays").on("click", function() {
    $(".todays").addClass("active2");
  });
  $(".todays").on("click", function() {
    $(".today-text").addClass("active2");
  });

  $(".close3").on("click", function() {
    $(".user-data").removeClass("active");
  });
  $(".close3").on("click", function() {
    $(".todays").removeClass("active2");
  });
  $(".close3").on("click", function() {
    $(".today-text").removeClass("active2");
  });

  $(".todays2").on("click", function() {
    $(".user-targetdata").addClass("active");
  });
  $(".todays2").on("click", function() {
    $(".todays2").addClass("active2");
  });
  $(".todays2").on("click", function() {
    $(".user_targettext").addClass("active2");
  });

  $(".close2").on("click", function() {
    $(".user-targetdata").removeClass("active");
  });
  $(".close2").on("click", function() {
    $(".todays2").removeClass("active2");
  });
  $(".close2").on("click", function() {
    $(".user_targettext").removeClass("active2");
  });
  $(".close_nav").on("click", function() {
    $(".header-mypage-nav").removeClass("open");
  });
  $(".close_nav").on("click", function() {
    $(".hamburger").removeClass("active");
  });
</script>

</html>