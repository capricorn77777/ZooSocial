<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function showCommentForm(Post $post)
    {
        $comments = $post->comments;

        if ($comments->isEmpty()) {
            return view('onePostShow', compact('post'));
        } else {
            return view('onePostShow', compact('post', 'comments'));
        }
    }
    public function store(Request $request, Post $post)
    {
        // バリデーションルール
        $validatedData = $request->validate([
            'content' => 'required|string|max:255',
        ]);

        // コメントを作成して保存
        $comment = new Comment();
        $comment->content = $validatedData['content'];
        $comment->post_id = $post->id; // ポストに関連付ける
        $comment->user_id = auth()->id(); // 現在のログインユーザーのIDを取得する必要があります
        $comment->save();

        // リダイレクトまたは他の応答を返す
        return redirect()->route('home');
        
    }
}
