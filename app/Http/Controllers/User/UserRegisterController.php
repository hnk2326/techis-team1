<?php
// このコントローラーを Userディレクトリに置いているので、この行を書く
namespace App\Http\Controllers\User;
// このコントローラーを Userディレクトリに置いているので、この行を書く
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

// 最下段らへんの Auth::を使うために呼び出す
use Illuminate\Support\Facades\Auth;
// パスワードのハッシュ化のために呼び出す
use Illuminate\Support\Facades\Hash;
// データベースを扱うためUserモデルを呼び出せるようにする
use App\Models\User;
use Illuminate\Support\Facades\Gate;


class UserRegisterController extends Controller
{
    /**
     * アカウント登録画面を表示
     *
     * ToDo:管理者権限によるアクセス制限を実装
     *
     * @return url
     */
    public function showUserRegister()
    {
        return view('/users.user-register');
    }

    /**
     * ユーザーアカウントを登録する
     *
     * @param Request $request　アカウント作成フォームに入力した情報
     * @return $error|url　エラーがあればエラーを持って登録画面へ
     */
    public function UserRegister(Request $request)
    {

        if(!isset($request->role)) $request->role = 0;

        // バリデーションの確認
        $this->validate($request,[
            // ###### バリデーションのチェックしない動作確認用
            // 'name' => 'required|string', // 必須、文字列
            // 'email' => 'required|email|unique:users', // 必須、@を含むアドレス、★★メールアドレス被り禁止★★
            // 'password' => 'required', // 必須
            // 'role' => 'boolean', // ０か１

            // ##### バリデーションする本番用
            'name' => 'required|string|max:20', // 必須、文字列、最大文字数20文字
            'email' => 'required|email|max:255|unique:users', // 必須、@を含むアドレス、最大文字数40文字、uesrsテーブルに同じメールアドレスがあったらダメ
            'password' => 'required|string|between:8,16|confirmed', // 必須、文字列(数字も可)、8～12文字、パスワード確認用が同じか、ToDo:Password::rule
            'role' => 'boolean', // ０一般か、１管理者

            // パスワードをもっと強力なものにするために
            // 文字・数字・大文字小文字・記号を「含めさせる」passwordなどの弱いパスワードをＮＧにすることもできる。
            // 余力があったら実装する。必要なら発表で言及する。たぶんしない。
        ]);

        // Userモデルで、データベースにアカウント情報のレコードを登録
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // laravelのHash機能を使って、人間に読めないハッシュ状態に暗号化する
            'role' => $request->role,
        ]);


        // 今登録した$userでログインする。
        // Auth::login($user);
        //
        // 管理者が、新しい人のアカウントを作ってあげることもできる。
        // その時は管理者が今登録した新規アカウントにログインする必要はないのでスキップする
        // Gate::denies('admin') admin権限の人はfalse、それ以外ならtrueを返す
        if(Gate::denies('admin')) Auth::login($user);


        // ホーム画面に遷移する
        return redirect('home');
    }
}
