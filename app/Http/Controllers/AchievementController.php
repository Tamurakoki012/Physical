<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Achievement;
use App\Models\Training;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AchievementController extends Controller
{

  public function achievement()
  {
    return view('players.outcome');
  }

  public function today_complete(Request $request)
  {

    $request->validate(
      [
        'today_record' => ['required', 'nullable', 'regex:/^[0-9]+$/'],

        'today_record2' => ['nullable', 'regex:/^[0-9]+$/', 'required_with:today_exercise2', 'nullable', 'string'],
        'today_exercise2' => ['required_with:today_record2', 'nullable', 'string'],

        'today_record3' => ['nullable', 'regex:/^[0-9]+$/', 'required_with:today_exercise3', 'nullable', 'string'],
        'today_exercise3' => ['required_with:today_record3', 'nullable', 'string'],

        'unit' => ['required', 'nullable'],

        'unit2' => ['required_with:today_record2', 'nullable', 'string'],

        'unit3' => ['required_with:today_record3', 'nullable', 'string'],
      ],
      [
        'today_record.required' => '記録は必須入力です。',
        'today_record.regex' => '記録は整数で入力して下さい',

        'today_record2.regex' => '記録は整数で入力して下さい',
        'today_record2.required_with' => 'Record2を入力して下さい',
        'today_exercise2.required_with' => 'Menu2を入力して下さい',

        'today_record3.regex' => '記録は整数で入力して下さい',
        'today_record3.required_with' => 'Record3を入力して下さい',
        'today_exercise3.required_with' => 'Menu3を入力して下さい',

        'unit' => '回数・時間・kmは必須入力です',

        'unit2.required_with' => 'unit2を入力して下さい',

        'unit3.required_with' => 'unit3を入力して下さい',
      ]
    );

    Achievement::create([
      'today_exercise' => $request->today_exercise,
      'today_exercise2' => $request->today_exercise2,
      'today_exercise3' => $request->today_exercise3,
      'today_record' => $request->today_record,
      'today_record2' => $request->today_record2,
      'today_record3' => $request->today_record3,
      'unit' => $request->unit,
      'unit2' => $request->unit2,
      'unit3' => $request->unit3,
    ]);
    $request->session()->regenerateToken();
    return view('players.today_complete');
  }

  public function my_page()
  {
    $user_id = Auth::id(); //ログインユーザーのID取得
    $selectdate = strtotime(date('Y-m-d H:i'));
    $target_start = Training::where('target_strat');
    $target_end = Training::where('target_end');
    $diff_day = Training::orderBy('target_num', 'desc')->value('created_at')->diffInDays(Carbon::now());
    $target = Training::latest()->get();
    $target = Training::with('user')->where('user_id', '=', $user_id)->simplePaginate(8);
    $achievement = Achievement::latest()->get();
    $achievement = Achievement::with('user')->where('user_id', '=', $user_id)->simplePaginate(8); //ログインユーザーのIDに紐ついたdataのみ取得
    return view('players.mypage', ['achievement' => $achievement, 'target' => $target, 'diff_day' => $diff_day, 'target_start'=>$target_start, 'target_end'=>$target_end, 'selectdate'=>$selectdate]); // views/players/mypage.blade.phpに取得データを渡す
  }
}
