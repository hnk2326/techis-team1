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
    {}

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
    public function login(Request $request):RedirectResponse // :RedirectResponse 返り値はResponse型
    {
        // バリデーション、エラーがあったらログイン画面に戻る（validate( )の標準機能）
        $this->validate($request,[
            'email' => 'required|email', // 必須、メールアドレス形式
            'password' => 'required', // 必須
        ]);

        // Auth::attempt でデータベースの情報とリクエストされた情報を照合し
        // 合致していたらtrue → ログインするための ifコードを実行
        // でなければ falseで ifをスキップ
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // ブラウザのセッション情報を再生成(regenerate)して、ログインしようとする動作をリセットする
            $request->session()->regenerate();
            // ログイン後の画面に遷移させる
            return redirect('home')->with('login_done','ログインしました');
        }

        // ユーザー情報のメールアドレスかパスワードが間違っていたらエラーメッセージを表示させる
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
