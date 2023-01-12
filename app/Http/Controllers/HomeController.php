<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Player;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
public function changePassword()
{
    $players = Player::all();
    $user = Auth::user();
    $id = Auth::id();
   return view('players.password',compact('id','user','players'));
} 

public function updatePassword(Request $request)
{
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "旧Passwordに相違があります");
        }

        Player::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Passwordを変更しました");
}

}