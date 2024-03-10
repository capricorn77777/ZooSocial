<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//
use App\Models\Post;
class HomeController extends Controller
{
    

    public function index()
    {
        // 全てのユーザーから最新の10件のポストを取得
        $posts = Post::with('user')->latest()->take(30)->get();

        // ビューにポストを渡す
        return view('home', compact('posts'));
    }

    public function followIndex()
{
    // ログインユーザーがフォローしているユーザーのIDを取得
    $followingIds = auth()->user()->following()->pluck('users.id');

    // フォローしているユーザーのポストを取得
    $posts = Post::whereIn('user_id', $followingIds)->latest()->get();

    return view('follow_post', compact('posts'));
}

}
