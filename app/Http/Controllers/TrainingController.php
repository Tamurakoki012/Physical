<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;
use Illuminate\Support\Facades\Auth;

class TrainingController extends Controller
{
  public function exercise()
  {
    //全てのデータ取得　
    $exercise = Training::all();
    $user = Auth::user();
    $user_id = Auth::id();
    return view('players.target', compact('exercise', 'user', 'user_id'));
  }

  public function target_complete(Request $request)
  {

    $request->validate(
      [
        'target_num' => ['required', 'nullable', 'regex:/^[0-9]+$/'],
        'exercise_record' => ['required', 'nullable', 'regex:/^[0-9]+$/'],

        'exercise_record2' => ['nullable', 'regex:/^[0-9]+$/', 'required_with:exercise_name2', 'nullable', 'string'],
        'exercise_name2' => ['required_with:exercise_record2', 'nullable', 'string'],

        'exercise_record3' => ['nullable', 'regex:/^[0-9]+$/', 'required_with:exercise_name3', 'nullable', 'string'],
        'exercise_name3' => ['required_with:exercise_record3', 'nullable', 'string'],

        'unit' => ['required', 'nullable'],

        'unit2' => ['required_with:exercise_record2', 'nullable', 'string'],

        'unit3' => ['required_with:exercise_record3', 'nullable', 'string'],

        'target_weight' => ['required', 'nullable', 'regex:/^[0-9]+$/'],
      ],
      [
        'target_num.required' => '目標日数は必須入力です',
        'target_num.regex' => '目標日数は整数で入力して下さい',

        'exercise_record.required' => '記録は必須入力です',
        'exercise_record.regex' => '記録は整数で入力して下さい',

        'exercise_record2.regex' => '記録は整数で入力して下さい',
        'exercise_record2.required_with' => 'Record2を入力して下さい',
        'exercise_name2.required_with' => 'Menu2を入力して下さい',

        'exercise_record3.regex' => '記録は整数で入力して下さい',
        'exercise_record3.required_with' => 'Record3を入力して下さい',
        'exercise_name3.required_with' => 'Menu3を入力して下さい',

        'unit' => '回数・時間・kmは必須入力です',

        'unit2.required_with' => 'unit2を入力して下さい',

        'unit3.required_with' => 'unit3を入力して下さい',

        'target_weight.required' => '目標体重は必須入力です',
        'target_weight.regex' => '目標体重は整数で入力して下さい'
      ]
    );

    Training::create([
      'exercise_name' => $request->exercise_name,
      'exercise_name2' => $request->exercise_name2,
      'exercise_name3' => $request->exercise_name3,
      'exercise_record' => $request->exercise_record,
      'exercise_record2' => $request->exercise_record2,
      'exercise_record3' => $request->exercise_record3,
      'unit' => $request->unit,
      'unit2' => $request->unit2,
      'unit3' => $request->unit3,
      'target_num' => $request->target_num,
      'target_weight' => $request->target_weight,
    ]);
    $request->session()->regenerateToken();
    return view('players.target_complete');
  }  
}
