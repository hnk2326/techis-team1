<?php

use Illuminate\Support\Facades\Route;

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

// todo：～～:8000/(空白)でアクセスしたときの表示ページを変更するか？
Route::get('/', function () {
    return view('welcome');
});


Route::get('/index', [App\Http\Controllers\ItemController::class, 'index']);
Route::get('/side', function() {
    return view('/side');
});
Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
Route::get('/items', [App\Http\Controllers\ItemController::class, 'index']);
