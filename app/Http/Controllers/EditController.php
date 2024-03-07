<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class EditController extends Controller
{
    //
      // ユーザー情報の編集フォームを表示する
      public function editUserForm($id)
      {
          $user = User::findOrFail($id);
          return view('edit', ['user' => $user]);
      }
  
      // ユーザー情報を更新する
      public function updateUser(Request $request, $id)
      {
          $user = User::findOrFail($id);
          $user->name = $request->name;
          $user->email = $request->email;
          $user->profileImage_url = $request->profileImage_url;
          $user->animal_name = $request->animal_name;
          // 他のプロパティも必要に応じて更新する
  
          $user->save();
  
          return redirect()->route('home')->with('success', 'User updated successfully!');
      }
}
