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

  @include("players.header")

  <div class="day">
    <div class="target-text2">
      <h3>Results of the day</h3>
      <p>成果を登録しましょう</p>
      <p><span>*</span>必須項目</p>
    </div>

    <form class="achievement-form" action="today_complete" method="post">
      {{ csrf_field() }}

      <div class="mastar">
        <div class="exercise_table">
          <!-- 必須 -->
          <div class="achievement">
            <label for="achievement"><span>*</span>Menu:</label>
            <select name="today_exercise" id="today_exercise">
              <option value="腹筋">腹筋</option>
              <option value="腕立て">腕立て</option>
              <option value="背筋">背筋</option>
            </select>
          </div>

          @if ($errors->has('today_exercise2'))
          <p style="color:red;font-size: 10px;">{{$errors->first('today_exercise2')}}</p>
          @endif
          <div class="achievement">
            <label for="achievement">Menu2</label>
            <select name="today_exercise2" id="today_exercise2">
              <option value=""></option>
              <option value="腹筋">腹筋</option>
              <option value="腕立て">腕立て</option>
              <option value="背筋">背筋</option>
              <option value="ランニング">ランニング</option>
              <option value="ジョギング">ジョギング</option>
            </select>
          </div>

          @if ($errors->has('today_exercise3'))
          <p style="color:red;font-size: 10px;">{{$errors->first('today_exercise3')}}</p>
          @endif
          <div class="achievement">
            <label for="achievement">Menu3</label>
            <select name="today_exercise3" id="today_exercise3">
              <option value=""></option>
              <option value="腹筋">腹筋</option>
              <option value="腕立て">腕立て</option>
              <option value="背筋">背筋</option>
              <option value="ランニング">ランニング</option>
              <option value="ジョギング">ジョギング</option>
            </select>
          </div>
        </div>

        {{ csrf_field() }}
        <div class="record-table2">
          <!-- 必須 -->
          @if ($errors->has('today_record'))
          <p style="color:red;font-size: 10px;">{{$errors->first('today_record')}}</p>
          @endif
          <div class="achievement-record">
            <label for="today_record"><span>*</span>Record</label><input class="" type="text" name="today_record" value="<?php if (!empty($_POST["today_record"])) {
                                                                                                                            echo htmlspecialchars($_POST["today_record"]);
                                                                                                                          } ?>"></input>
            @if ($errors->has('unit'))
            <p style="color:red;font-size: 10px;">{{$errors->first('unit')}}</p>
            @endif
            <select name="unit">
              <option value=""></option>
              <option value="回">回</option>
              <option value="km">km</option>
              <option value="時間">時間</option>
            </select>
          </div>

          <div class="achievement-record">
            @if ($errors->has('today_record2'))
            <p style="color:red;font-size: 10px;">{{$errors->first('today_record2')}}</p>
            @endif
            <label for="today_record2">Record2</label><input class="" type="text" name="today_record2" value="<?php if (!empty($_POST["today_record2"])) {
                                                                                                                echo htmlspecialchars($_POST["today_record2"]);
                                                                                                              } ?>"></input>
            @if ($errors->has('unit2'))
            <p style="color:red;font-size: 10px;">{{$errors->first('unit2')}}</p>
            @endif
            <select name="unit2">
              <option value=""></option>
              <option value="回">回</option>
              <option value="km">km</option>
              <option value="時間">時間</option>
            </select>
          </div>

          <div class="achievement-record">
            @if ($errors->has('today_record3'))
            <p style="color:red;font-size: 10px;">{{$errors->first('today_record3')}}</p>
            @endif
            <label for="today_record3">Record3</label><input class="" type="text" name="today_record3" value="<?php if (!empty($_POST["today_record3"])) {
                                                                                                                echo htmlspecialchars($_POST["today_record3"]);
                                                                                                              } ?>"></input>
            @if ($errors->has('unit3'))
            <p style="color:red;font-size: 10px;">{{$errors->first('unit3')}}</p>
            @endif
            <select name="unit3">
              <option value=""></option>
              <option value="回">回</option>
              <option value="km">km</option>
              <option value="時間">時間</option>
            </select>
          </div>
        </div>
      </div>
      <div class="">
        {{ csrf_field() }}
        <input type="submit" name="today_cmplete" class="button13" value="記録">
      </div>
      <div class="button7">
        <a href="index" class="">戻る</a>
      </div>
    </form>
  </div>
</body>

</html>