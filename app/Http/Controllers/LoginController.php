<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * ログインフォームを表示する
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * ユーザーを認証し、ログインする
     */
    public function login(Request $request)
    {
        // バリデーションルール
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // ユーザーを認証する
        if (Auth::attempt($validatedData)) {
            // 認証成功時の処理
            return redirect()->intended('/home');
        } else {
            // 認証失敗時の処理
            return back()->withErrors(['email' => 'メールアドレスまたはパスワードが正しくありません。']);
        }
    }

    /**
     * ログアウトする
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // ログアウト後にリダイレクトする場所を指定する（例：ログインフォームに戻る）
        return redirect('/login');
    }
}
