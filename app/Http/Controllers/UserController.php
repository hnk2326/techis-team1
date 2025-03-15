<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // ユーザー管理画面
    public function index()
    {
        $users = User::all();
        return view('users.user', compact('users'));
    }

    // ユーザー編集画面
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.user_edit', compact('user'));
    }

    // ユーザー更新処理
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'required|min:8|confirmed', // password は任意入力
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>$request->password,
        ]);
        

        return redirect()->route('users.index')->with('success', 'ユーザー情報を更新しました。');
    }

    public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('users.index')->with('success', 'ユーザーを削除しました。');
}

}
