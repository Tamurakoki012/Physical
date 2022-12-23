<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Player;
use App\Models\Manager;

class ManagerController extends Controller
{

    public function manager_signin()
    {
        return view('players.manager');
    }

    public function manager_login(Request $request)
    {
        $users = Manager::all();
        return view('players.manager_list', compact('users'));
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $email = $request->email;
        return view('players.edit', compact('id', 'name', 'email'));
    }

    public function update1(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'max:10'],
                'email' => ['required', 'email'],
            ],
            [
                'name.required' => '氏名は必須入力です。',
                'name.max' => '10字以内でご入力ください。',
                'email.required' => 'emailは必須入力です。',
                'email.email' => 'emailは正しくご入力ください。',
            ]
        );
        $id = $request->id;
        $name = $request->name;
        $email = $request->email;
        $created_at = $request->created_at;
        return view('players.update1', compact('id', 'name', 'email'));
    }

    public function update2(Request $request)
    {
        Player::where('id', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return view('players.update2');
    }

    public function delete(Request $request)
    {
        Player::where('id', $request->id)->delete();

        return view('players.delete');
    }
}
