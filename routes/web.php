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

// 商品一覧画面
Route::get('/index', [App\Http\Controllers\ItemController::class, 'index']);

Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index']);
// 商品を１件削除
Route::post('/itemDestroy/{id}', [App\Http\Controllers\ItemController::class, 'destroy']);

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

// ####################################
// ログイン認証および管理者権限の動作確認用
// そのうち消します。
// #### 試したい人へ
// #### 管理者権限を付けたアカウントと、管理者権限のないアカウントを作り
// #### 下記のアドレスを直接開いてください（リンク無いです）
// #### http:/127.0.0.1:8000/login-test
// ####                      ^^^^^^^^^^
Route::group([],function () {

    // ログイン動作確認用のページ
    Route::get('/login-test', function () {
        return view('auth.login-test');
    });

    // 管理者権限のみ閲覧できるページの確認用
    Route::get('/admin-test', fn () => view('auth.admin-test'))->can('admin'); // ログイン中 かつ 管理者権限でしか開けない （ログイン中のフィルターは実質意味がないです）

})->middleware('auth'); // ログイン中にしか開けない
// ####################################



// User
Route::get('/user', [UserController::class, 'index'])->name('users.index'); // ユーザー管理画面
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('users.edit'); // ユーザー編集画面
Route::post('/user/{id}/update', [UserController::class, 'update'])->name('users.update'); // ユーザー更新
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('users.destroy');// ユーザー削除
