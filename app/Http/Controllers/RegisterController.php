<?php
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // バリデーションルールを定義する（省略）
        
        // ユーザーの入力を検証する
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8|max:255',
            'animal_name' => 'nullable|string|max:255', // 追加のバリデーションルール
            'profile_image' => 'nullable|string', // 追加のバリデーションルール
            // 他の必要なバリデーションルールを追加する
        ]);

        // Userモデルの新しいインスタンスを作成し、データを設定する
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->animal_name = $validatedData['animal_name']; // 追加のプロパティを設定する
        $user->profile_image = $validatedData['profile_image']; // 追加のプロパティを設定する
        
        // Userモデルを保存する
        $user->save();

        // ユーザーを登録後の処理を追加する（例：リダイレクトなど）

        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }
}
