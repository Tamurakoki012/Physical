<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Userdate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PlayersController extends Controller
{

  public function index()
  {
    return view('index');
  }

  public function login_test()
  {
    return view('login_test');
  }

  public function new()
  {
      //全てのデータ取得　
      $players = Player::all();
      //newにplayersデータを飛ばす
      return view('players.new', compact('players'));
  }

  public function new_post(Request $request)
  {
      if ($request->input('back') == 'back') {
          return redirect('new')->withInput();
      }
      return view('players.new');
  }

  public function confirm(Request $request)
  {
      $user = new Player;
      $request->validate(
          [
              'name' => ['required', 'max:10'],
              'email' => ['required', 'email'],
              'password' => ['required']
          ],
          [
              'name.required' => '氏名は必須入力です。',
              'name.max' => '10字以内でご入力ください。',
              'email.required' => 'メールアドレスは必須入力です。',
              'email.email' => 'メールアドレスは正しくご入力ください。',
              'password.required' => 'パスワードは必須入力です。'
          ]
      );
      $user -> fill($request->all());//値一括セット
      return view('players.confirm', compact('user'));
  }

  public function complete(Request $request)
  {
     
      Player::create([
          'name' => $request->name,
          'email' => $request->email,
          "password" => Hash::make($request->input("password")),
          'created_at ' => $request->created_at
      ]);
      
      $request->session()->regenerateToken();
      return view('players.complete');
  }

  public function signin()
  {
      return view('players.login');
  }

  public function login(Request $request)
  {
      $user = Auth::user();
      $id = Auth::id();
      $user_info = $request->validate([
          'email' => ['required', 'email'],
          'password' => ['required'],
      ]);

      if (Auth::attempt($user_info)) {
          $request->session()->regenerate();
          return view('players.index',compact('user', 'id'));
      }
      return back()->withErrors([
          'messagge' => 'メールアドレス、もしくは、パスワードが違います。',
      ]);
  }

  public function doLogout()
  {
      Auth::logout();
      return redirect('login')->with('message', 'ログアウトしました');
  }

  public function serch(Request $request) {
      $keyword_name = $request->name;
      $keyword_email = $request->email;

      if(!empty($keyword_name) && empty($keyword_email)) {
      $query = Player::query();
      $users = $query->where('name','like', '%' .$keyword_name. '%')->get();
      $message = "「". $keyword_name."」を含む名前の検索が完了しました。";
      return view('players.serch')->with([
        'users' => $users,
        'message' => $message,
      ]);
    }

    if(empty($keyword_name) && !empty($keyword_email)) {
      $query = Player::query();
      $users = $query->where('email','like', '%' .$keyword_email. '%')->get();
      $message = "「". $keyword_email."」を含む名前の検索が完了しました。";
      return view('players.serch')->with([
        'users' => $users,
        'message' => $message,
      ]);
    }
    elseif(empty($keyword_name) && !empty($keyword_email)){
      $query = Player::query();
      $users = $query->where('email','<=', $keyword_email)->get();
      $message = $keyword_email. "歳以下の検索が完了しました";
      return view('players.serch')->with([
        'users' => $users,
        'message' => $message,
      ]);
    }
    elseif(!empty($keyword_name) && !empty($keyword_email)){
      $query = Player::query();
      $users = $query->where('name','like', '%' .$keyword_name. '%')->where('email','>=', $keyword_email)->get();
      $message = "「".$keyword_name . "」を含む名前と". $keyword_email. "歳以上の検索が完了しました";
      return view('players.serch')->with([
        'users' => $users,
        'message' => $message,
      ]);
    }
    elseif(!empty($keyword_name) && !empty($keyword_email)){
      $query = Player::query();
      $users = $query->where('name','like', '%' .$keyword_name. '%')->where('email','<=', $keyword_email)->get();
      $message = "「".$keyword_name . "」を含む名前と". $keyword_email. "歳以下の検索が完了しました";
      return view('players.serch')->with([
        'users' => $users,
        'message' => $message,
      ]);
    }
    else {
      $message = "検索結果はありません。";
      return view('players.serch')->with('message',$message);
      }
}

  public function userdate()
  {
    //全てのデータ取得　
    $userdate = Userdate::all();
    return view('players.mydate', compact('userdate'));
  }

  public function userdate_store(Request $request)
  {

    $request->validate(
      [
        'user_name' => ['required'],
        'user_tell' => ['required'],
        'post' => ['required'],
        'prefectures' => ['required'],
        'municipality' => ['required'],
        'address' => ['required'],
      ],
    );

    Userdate::create([
      'user_name' => $request->user_name,
      'user_tell' => $request->user_tell,
      'post' => $request->post,
      'prefectures' => $request->prefectures,
      'municipality' => $request->municipality,
      'address' => $request->address,
      'building' => $request->building,
    ]);
    $request->session()->regenerateToken();
    return redirect('mydate')->with('flash_message', '登録が完了しました');
  }

  public function mydate_profile()
  {
    $user_id = Auth::id();
    $user_date_profile = Userdate::with('user')->where('user_id', '=', $user_id)->simplePaginate(1); //ログインユーザーのIDに紐ついたdataのみ取得
    return view('players.profile', ['user_date_profile' => $user_date_profile]); // views/players/mypage.blade.phpに取得データを渡す
  }
}
