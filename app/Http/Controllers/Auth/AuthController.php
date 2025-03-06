<?php

// このコントローラーファイルが \Controllers\Authフォルダにあるので明示する
namespace App\Http\Controllers\Auth;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
// 認証用のAuthファサードを使用するため
use Illuminate\Support\Facades\Auth;
// Authディレクトリを作ったのでControllerの元のディレクトリを明示
use App\Http\Controllers\Controller;


/**
 * ログイン認証用のコントローラー
 */
class AuthController extends Controller
{
    /**
     * コンストラクタ
     * このコントローラーが呼び出されたときに必ず実行される処理
     *
     *
     */
    public function __construct()
    {
        // middleware('guest')を呼び出している
        // 　「ログアウト状態の人だけ許可をする」という機能
        //
        // 今このコントローラーを呼び出した人が、すでにログインしている場合
        // もう一度ログインをする必要はないので、操作ミスということにしてホーム画面へリダイレクト・遷移させる

        // [月森]　念のため実装を見送ります
        // $this->middleware('guest');
    }


    /**
     * ログイン認証を行う
     *
     * １，ログイン画面から送られてきたユーザー情報をバリデーション
     * ２，バリデーションのエラーがあったらエラーを表示する
     * ３，ログイン認証を誤って繰り返さないようにする
     *
     * @param Request $request ログイン画面から送られてきたPOST-formの中身
     * @return redirect|$error
     */
    public function login(Request $request):RedirectResponse // :RedirectResponse 返り値はResponse型ですよ、というメモ
    {
        // バリデーション、エラーがあったらログイン画面に戻る（validate( )の標準機能）
        $this->validate($request,[
            'email' => 'required|email', // 必須、メールアドレス形式
            'password' => 'required', // 必須
        ]);

        // ログイン操作が短時間に繰り返されたときの危険回避
        // Auth::attempt 取得した情報と今のログインユーザーの情報を照らし合わせる
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // ブラウザのセッション情報を再生成(regenerate)して、ログインしようとする動作をリセットする
            $request->session()->regenerate();
            // ログイン後の画面に遷移させる
            return redirect()->intended('home');
        }

        // ユーザー情報のメールアドレスが間違っていたらエラーエラーメッセージを表示させる
        return back()->withErrors([
            'email' => '入力された登録情報が間違っています。',
        ]);
    }

    /**
     * ログアウトをする
     *
     * laravel標準のAuthファサード(Auth::)機能でログアウトする
     * ブラウザで記憶しているセッション情報をリセットして、ブラウザのログイン状態もキレイに削除する
     *
     * @param Request $request
     * @return redirect
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate(); // セッションを無効に
        $request->session()->regenerateToken(); // CSRFトークンを再生成・リセット
        return redirect('login');
    }
}
