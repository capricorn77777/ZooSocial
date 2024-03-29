<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

    public function guestLogin()
    {
        // ゲストユーザーの認証情報
        $guestCredentials = [
            'email' => 'guest@example.com',
            'password' => 'guestpassword',
        ];

        // ユーザーを認証する
        if (Auth::attempt($guestCredentials)) {
            // 認証成功時の処理
            return redirect()->intended('/home');
        } else {
            // 認証失敗時の処理
            return back()->withErrors(['email' => 'ゲストログインに失敗しました。']);
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
