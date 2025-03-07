<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
// ログイン認証用コントローラーをこのファイル内で使うよ！という宣言
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserRegisterController;


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


Route::get('user', function () {
    return view('users.user');
});

Route::get('user_edit', function () {
    return view('users.user_edit');
});
// 商品一覧画面
Route::get('/index', [App\Http\Controllers\ItemController::class, 'index']);
// Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
// http://127.0.0.1:8000 から表示される画面をログイン画面にする
Route::get('/', function () {
    return view('/auth.login');
});
Route::get('/items', [App\Http\Controllers\ItemController::class, 'index']);

// 商品登録
Route::get('/create', [App\Http\Controllers\ItemController::class, 'create']);
Route::post('/itemCreate', [App\Http\Controllers\ItemController::class, 'itemCreate']);

// 動作確認用の仮のホーム画面のルーティング（月森
// 仮のホーム画面 home.blade.phpも作ってありますが内容はほぼ白紙です。承知しました(森本)
Route::get('/home', function() {
    return view('/items.home');
});

// ユーザー登録画面を表示
Route::get('/UserRegister', [UserRegisterController::class, 'showUserRegister']);
// アカウント作成コントローラ呼び出し
Route::post('/UserRegister', [UserRegisterController::class, 'UserRegister']);

// ログイン画面を表示する
Route::get('/login', function () {
    return view('/auth.login');
});

// ログイン画面でログインボタンを押したらログイン認証用のコントローラーを呼び出す
Route::post('/login', [AuthController::class, 'login']);
// ログアウトボタンを押したらログイン認証用のコントローラーを呼び出してログアウトする
Route::post('/logout', [AuthController::class, 'logout']);
// ログイン動作確認用のページです。最後には消します。
Route::get('/login-test', function () {
    return view('auth.login-test');
})->middleware('auth'); // このmiddleware(auth)を付けるとログイン中専用のページになります。あとで月森が付けていきます。説明もします。
// この時にでるエラーは後で対応します！

