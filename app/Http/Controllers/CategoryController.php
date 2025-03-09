<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

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
            $items = $query->paginate(10)->withQueryString(); // 検索結果を取得
            $totalPrice = Item::where('category_id', $categoryId)->sum('price');
        } else {
        // ページネーションとクエリ文字列を保持
        $items = $query->paginate(10)->withQueryString();
        $totalPrice = Item::all()->sum('price');
        }

        // 検索結果をビューに渡す
        return view('items.index', compact('items', 'message', 'totalPrice'));
    }
}
