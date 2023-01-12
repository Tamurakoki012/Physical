<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function postimg()
    {
        return view('players.img');
    }

    public function saveimg(Request $request)
    {
        $request->file('post_img')->store('public/post_img');
        //post_imgというnameのファイルが来たら、
        //storage\app\public\post_imgフォルダにそれをstore(保存)せよ。その後、元の投稿ページにリダイレクトせよ。という命令が書いてあります。
        return redirect('/create3');
    }
}
