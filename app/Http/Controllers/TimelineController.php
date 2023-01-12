<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; // <--- 追加
use App\Models\Tweet;

class TimelineController extends Controller
{
    public function showTimelinePage()
    {
        $tweets = Tweet::latest()->get();  // <--- 追加
        return view('players.timeline', compact('tweets'));   // <--- 変更
    }

    public function postTweet(Request $request) // <--- 色々変更
    {
        $validator = $request->validate([ // これだけでバリデーションできるLaravelすごい！
            'tweet' => ['required', 'string', 'max:280'], // 必須・文字であること・280文字まで（ツイッターに合わせた）というバリデーションをします（ビューでも軽く説明します。）
        ]);
        Tweet::create([ // tweetテーブルに入れるよーっていう合図
            'user_id' => Auth::user()->id, // Auth::user()は、現在ログインしている人（つまりツイートしたユーザー）
            'tweet' => $request->tweet, // ツイート内容
        ]);
        return back(); // リクエスト送ったページに戻る（つまり、/timelineにリダイレクトする）
    }
}