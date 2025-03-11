<?php

namespace App\Providers;
use App\Models\User;
use Illuminate\Auth\Access\Response;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any authentication / authorization services.
     * 認証についてあれこれ機能を追加できますfunction関数
     *
     * 今回は、今WEBアプリを使っている人の権限有無を返すgateを設定している。
     *      管理者 admin
     *      一般ユーザー general
     *          呼び出し例
     *           Route()->middleware(['auth', 'can:admin'])
     *           Route()->middleware('can:admin')
     *           Route->can('admin')
     *  view内:  @can('admin') ~~~ @elsecan ~~~ @else ~~  @endcan
     */
    public function boot(): void
    {

        // 管理者ユーザー
        Gate::define('admin',
            function (User $user) {
                return $user->role;

                // 返すエラーのカスタマイズ 自分用メモ 今回はとりあえず見送り
                // 三項演算子 if(条件式) {true実行} else {false実行} endif を省略したようなやつでreturnを場合分けしている
                //  (条件式) ? (true実行) : (false実行)
                // return ($user->role === 1); // 条件式 今のユーザーのroleは 1 か？
                // return $user->role // 条件式：ここが 0 or 1 を聞かれている。 今回の role にはもともと 0 か 1 しか入っていないのでそのまま条件式の答えに使ってしまう。
                            // ? Response::allow() // trueなら response()-allow() をreturn
                            // : Response::denyAsNotFound(); // falseなら response()->denyAsNotFound();

                            // : response()->denyWithStatus(404); 同値
                            // 管理者認証に失敗したら、エラー404を表示させる
                            // エラー403は「何かの権限のトラブル」という意味もあり
                            // 悪意のある者に「このアドレスの先に重要な画面がある」などの情報を与える可能性がある
            }
        );

        /**
         * 一般ユーザー
         * 管理者はアクセスできないようにする
         * viewで一般ユーザーだけに表示される箇所に使うのが適当か？
         *
         * 使用例
         * @can('general')
         *      管理者に問い合わせてください。
         * @endcan
         *
         */
        Gate::define('general', function (User $user) {
            return $user->role === 0;
        });

    }
}
