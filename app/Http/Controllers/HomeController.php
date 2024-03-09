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

}
