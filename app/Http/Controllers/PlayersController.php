<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PlayersController extends Controller
{

    public function index_page()
    {
        return view('players.index');
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
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        return view('players.confirm', compact('name', 'email', 'password'));
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
        $user_info = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($user_info)) {
            $request->session()->regenerate();
            return view('players.index');
        }
        return back()->withErrors([
            'messagge' => 'メールアドレス、もしくは、パスワードが違います。',
        ]);
    }

    public function doLogout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function index()
    {
        $user = Auth::user();
        $id = Auth::id();
        return view('players.index', compact('user', 'id'));
    }

    public function sample()
    {
        return view('players.sample');
    }
}
