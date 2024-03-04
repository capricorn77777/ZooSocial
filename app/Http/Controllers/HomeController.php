<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    use App\Models\Post;

    public function index()
    {
        // 全てのユーザーから最新の10件のポストを取得
        $posts = Post::with('user')->latest()->take(10)->get();

        // ビューにポストを渡す
        return view('home', compact('posts'));
    }

}
