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
  
  <div class="target">
   @include("players.header")
   
    <div class="target-text">
      <h3>Goal setting</h3>
      <p>目標を設定しましょう</p>
      <p><span>*</span>必須項目</p>
    </div>

    <form class="target-form" action="target_complete" method="post">
      {{ csrf_field() }}
      <div class="target_num">
        <!-- 必須 -->
        @if ($errors->has('target_start'))
        <p style="color:red;font-size: 10px; text-align: center;">{{$errors->first('target_start')}}</p>
        @endif
        <span>*</span><input class="target_box" type="text" name="target_start" placeholder="開始日"></input>
        @if ($errors->has('target_end'))
        <p style="color:red;font-size: 10px; text-align: center;">{{$errors->first('target_end')}}</p>
        @endif
        ~<input class="target_box" type="text" name="target_end" placeholder="終了日"></input>
      </div>

      <div class="target_num">
        <!-- 必須 -->
        @if ($errors->has('target_num'))
        <p style="color:red;font-size: 10px; text-align: center;">{{$errors->first('target_num')}}</p>
        @endif
        <span>*</span><input class="target_box" type="text" name="target_num" placeholder="目標日数"></input>
      </div>
      <div class="target_num">
        <!-- 必須 -->
        @if ($errors->has('target_weight'))
        <p style="color:red;font-size: 10px; text-align: center;">{{$errors->first('target_weight')}}</p>
        @endif
        <span>*</span><input class="target_box" type="text" name="target_weight" placeholder="目標体重"></input>
      </div>
      <div class="mastar_table">
        <div class="exercise_table">
          <!-- 必須 -->
          <div class="exercise">
            <label for="exercise"><span>*</span>Menu</label>
            <select name="exercise_name" id="exercise_name">
            <option></option>
              <option value="腹筋">腹筋</option>
              <option value="腕立て">腕立て</option>
              <option value="背筋">背筋</option>
              <option value="ランニング">ランニング</option>
              <option value="ジョギング">ジョギング</option>
            </select>
          </div>

          @if ($errors->has('exercise_name2'))
          <p style="color:red;font-size: 10px;">{{$errors->first('exercise_name2')}}</p>
          @endif
          <div class="exercise">
            <label for="exercise2">Menu2</label>
            <select name="exercise_name2" id="exercise_name2">
              <option value=""></option>
              <option value="腹筋">腹筋</option>
              <option value="腕立て">腕立て</option>
              <option value="背筋">背筋</option>
              <option value="ランニング">ランニング</option>
              <option value="ジョギング">ジョギング</option>
            </select>
          </div>

          @if ($errors->has('exercise_name3'))
          <p style="color:red;font-size: 10px;">{{$errors->first('exercise_name3')}}</p>
          @endif
          <div class="exercise">
            <label for="exercise3">Menu3</label>
            <select name="exercise_name3" id="exercise_name3">
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
        <div class="record_table">
          <!-- 必須 -->
          @if ($errors->has('exercise_record'))
          <p style="color:red;font-size: 10px;  text-align: right;">{{$errors->first('exercise_record')}}</p>
          @endif
          <div class="exercise_record">
            <span>*</span><input class="target_box" type="text" name="exercise_record" placeholder="record"></input>
            @if ($errors->has('unit'))
            <p style="color:red;font-size: 10px;  text-align: right;">{{$errors->first('unit')}}</p>
            @endif
            <select name="unit">
              <option value=""></option>
              <option value="回">回</option>
              <option value="km">km</option>
              <option value="時間">時間</option>
            </select>
          </div>

          @if ($errors->has('exercise_record2'))
          <p style="color:red;font-size: 10px;  text-align: right;">{{$errors->first('exercise_record2')}}</p>
          @endif
          <div class="exercise_record">
            <input class="target_box" type="text" name="exercise_record2" placeholder="record2"></input>
            @if ($errors->has('unit2'))
            <p style="color:red;font-size: 10px;  text-align: right;">{{$errors->first('unit2')}}</p>
            @endif
            <select name="unit2">
              <option value=""></option>
              <option value="回">回</option>
              <option value="km">km</option>
              <option value="時間">時間</option>
            </select>
          </div>
          @if ($errors->has('exercise_record3'))
          <p style="color:red;font-size: 10px;">{{$errors->first('exercise_record3')}}</p>
          @endif
          <div class="exercise_record">
            <input class="target_box" type="text" name="exercise_record3" placeholder="record3"></input>
            @if ($errors->has('unit3'))
            <p style="color:red;font-size: 10px;  text-align: right;">{{$errors->first('unit3')}}</p>
            @endif
            <select name="unit3">
              <option value=""></option>
              <option value="回">回</option>
              <option value="時間">時間</option>
              <option value="km">km</option>
            </select>
          </div>
        </div>
      </div>
        <input type="submit" name="target_cmplete" class="button8" value="登録">   
      <div class="button13">
        <a href="index" class="">戻る</a>
      </div>
    </form>
  </div>
</body>

</html>