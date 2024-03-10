<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function showCreateForm()
    {
        return view('create');
    }

    
    public function create(Request $request)
    {
        // バリデーションルールを定義する（必要に応じて）
        $validatedData = $request->validate([
            'content' => 'required|string|max:255',
        ]);

        // ユーザーIDを取得（例：ログインユーザーのID）
        $userId = auth()->id();

        // 新しい投稿を作成してデータベースに保存する
        $post = new Post();
        $post->user_id = $userId;
        $post->content = $validatedData['content'];
        $post->save();

        // 投稿が正常に保存された場合のリダイレクトまたはレスポンスを返す
        return redirect()->route('home')->with('success', 'Post created successfully.');
    }

    public function showMyPage()
    {
    // ログインしているユーザーのIDを取得
    $userId = Auth::id();

    // ログインしているユーザーのIDに関連するポストのみを取得
    $posts = Post::where('user_id', $userId)->get();

    return view('mypage', compact('posts'));
    }

    public function delete($id)
    {
    $post = Post::findOrFail($id);
    $post->delete();
    return redirect()->route('my_posts')->with('success', 'Post deleted successfully.');
    }

    //javascript用のメソッド
    public function getPosts()
{
    $posts = Post::all();

    return response()->json($posts);
}
}
