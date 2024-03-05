<?php
namespace App\Http\Controllers; 
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // 追加

class RegisterController extends Controller
{
      /**
     * ユーザー登録フォームを表示する。
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        // バリデーションルールを定義する（省略）
        
        // ユーザーの入力を検証する
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8|max:255',
            'animal_name' => 'nullable|string|max:255', // 追加のバリデーションルール
            'profileImage_url' => 'nullable|url|max:255', // URLのバリデーションを追加
            // 他の必要なバリデーションルールを追加する
        ]);

        // 画像がアップロードされたかどうかを確認
        if ($request->hasFile('profile_image')) {
            // 画像を保存
            $imagePath = $request->file('profile_image')->store('profile_images', 'public');
            // 画像のURLをデータベースに保存するための準備
            $validatedData['profile_image'] = $imagePath;
        }


        // Userモデルの新しいインスタンスを作成し、データを設定する
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->animal_name = $validatedData['animal_name']; // 追加のプロパティを設定する
        $user->profileImage_url = $validatedData['profile_image']; // 追加のプロパティを設定する
        
        
        // Userモデルを保存する
        $user->save();

        // ログインユーザーを認証
        Auth::login($user);

        // ホームにリダイレクト
        return redirect()->route('home');
    }
}
