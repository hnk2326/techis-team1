<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate; 
use illuminate\Validation\Rules\Category;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        // セレクトボックスから送られた値を取得
        $categoryId = $request->input('category');

        // 検索処理
        $query = Item::query(); // Productモデルのインスタンスを作成

        $message = "検索キーワードを入力してください。"; // item検索の表示のため

        if (in_array($categoryId, [1, 2, 3, 4])) {
            // カテゴリが選択されている場合の検索
            $query->where('category_id', $categoryId);
            if (Gate::allows('admin')) {
                dump(Gate::allows('admin'));
                //  ～  管理者のみに実行して欲しい部分～
    
                // 管理者ならすべての商品を取得
                $items = $query->orderBy('date', 'desc')->get();
                $totalPrice = $query->sum('price');
            } else {
                // 一般ユーザーは自分が登録した商品のみ取得
                $items = $query->where('user_id', Auth::id())->orderBy('date', 'desc')->get();
                $totalPrice = $query->sum('price');
            }
        } else {
            if (Gate::allows('admin')) {
                dump(Gate::allows('admin'));
                //  ～  管理者のみに実行して欲しい部分～
    
                // 管理者ならすべての商品を取得
                $items = $query->orderBy('date', 'desc')->get();
                $totalPrice = $query->sum('price');
            } else {
                // 一般ユーザーは自分が登録した商品のみ取得
                $items = $query->where('user_id', Auth::id())->orderBy('date', 'desc')->get();
                $totalPrice = $query->sum('price');
            }
        }



        // 検索結果をビューに渡す
        return view('items.index', compact('items', 'message', 'totalPrice'));
    }
}
