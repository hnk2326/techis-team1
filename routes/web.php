<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserRegisterController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



/* ３ブロックに分かれています
| ルートを追加する際は該当のブロックの middleware() ～～～ }); ～～～の部分にRouteを書くと動作します。
|
| 1.ログイン済みユーザー用ページ
| 2.管理者専用ページ
| 3.ログアウト中の人用ページ
*/

// ####################################
// ##   ログイン中の人専用ページ
// ####################################
//
// ログインした人だけが見れるページ
//
// middleware('auth')： ログイン状態の人だけが見れるという認証
// group( )：複数のルートに同じmiddlewareの認証をかけるためにまとめている。
Route::middleware('auth')->group(function () {

// 商品一覧画面
Route::get('/index', [App\Http\Controllers\ItemController::class, 'index'])->name('items.index');

Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index']);
// 商品を１件削除
Route::delete('/itemDestroy/{id}', [App\Http\Controllers\ItemController::class, 'destroy']);

Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index']);
// Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
// http://127.0.0.1:8000 から表示される画面をログイン画面にする
Route::get('/', function () {
    return view('/auth.login');
});
Route::get('/items', [App\Http\Controllers\ItemController::class, 'index']);

    // 商品登録
    Route::get('/create', [App\Http\Controllers\ItemController::class, 'create']);
    Route::post('/itemCreate', [App\Http\Controllers\ItemController::class, 'itemCreate']);

    // 商品編集
    Route::get('/edit/{id}', [App\Http\Controllers\ItemController::class, 'edit']);
    Route::post('/itemEdit/{id}', [App\Http\Controllers\ItemController::class, 'itemEdit']);


    // 動作確認用の仮のホーム画面のルーティング
    Route::get('/home', function() {
        return view('/items.home');
    });

    // ログアウトボタンを押したらログイン認証用のコントローラーを呼び出してログアウトする
    Route::post('/logout', [AuthController::class, 'logout']);

});
//      ログイン中の人専用ページここまで
// ####################################
// ####################################



// **********************************
// **   管理者専用のページ
// **********************************
//  管理者権限(role = 1)を持っている人だけが見れるページたち
//
//
// middleware('can:admin')： role= 1 の人だけが見れるというgate認証
Route::middleware('can:admin')->group(function () {


    // User
    Route::get('/user', [UserController::class, 'index'])->name('users.index'); // ユーザー管理画面
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('users.edit'); // ユーザー編集画面
    Route::post('/user/{id}/update', [UserController::class, 'update'])->name('users.update'); // ユーザー更新
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('users.destroy');// ユーザー削除


});
// **   管理者ページここまで
// **********************************
// **********************************




// ####################################
// #####  アカウント登録用のページ
// ####################################
//
// アカウント登録が行われるのは
// １，新規ユーザーがログイン画面に来た時
// ２，管理者がサイドバーから登録しに来た時
// の２パターンだが
// 既存ユーザーがアカウントを追加すること自体は禁止されていないので
// ###   「誰にもアクセス制限をしない。」
// 厳密には何かしら認証をかけないといけないかも
//
//
// Route::middleware(['auth','can:admin'])->group(function (){

    // ユーザー登録画面を表示
    Route::get('/UserRegister', [UserRegisterController::class, 'showUserRegister']);
    // アカウント作成コントローラ呼び出し
    Route::post('/UserRegister', [UserRegisterController::class, 'UserRegister']);

// });
//     アカウント作成用ここまで
// ####################################


// ####################################
// #####  ログアウト中の人専用ページ
// ####################################
// ログイン状態で見る必要がない画面を、誤って開いた場合にホーム画面へ遷移させる。
// 見る必要がない画面  ==>> ログイン画面、ログインコントローラー
//
// middleware('guest')： ログアウト状態の人だけが見れるという認証
// group( )：複数のルートに同じmiddlewareの認証をかけるためにまとめている。
Route::middleware('guest')->group(function () {

    // http://127.0.0.1:8000 ＝ 「アプリのルート」はログイン画面
    Route::get('/', function () {
        return view('/auth.login');
    });

    // ログイン画面を表示する
    Route::get('/login', function () {
        return view('/auth.login');
    });

    // ログイン画面でログインボタンを押したらログイン認証用のコントローラーを呼び出す
    Route::post('/login', [AuthController::class, 'login']);
});
//     ログアウト中の人専用ページここまで
// ####################################






