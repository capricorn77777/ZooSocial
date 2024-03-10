<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FollowController extends Controller
{
    // ユーザーをフォローする
    public function follow(User $user)
    {
        auth()->user()->follow($user);
        return back()->with('success', 'フォローしました');
    }

    // ユーザーのフォローを解除する
    public function unfollow(User $user)
    {
        auth()->user()->unfollow($user);
        return back()->with('success', 'フォローを解除しました');
    }
}
