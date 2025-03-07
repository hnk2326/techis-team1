<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // 検索キーワード取得
        $search = $request->input('search');
        
        // クエリビルダーで検索
        $query = Item::query();
    
    if ($request->filled('search')) {
        $message = '検索結果: ' .$search;
        $items = Item::all();
        $query->where('item_name', 'like', '%' .$search. '%') // 
            ->orWhere('id', 'like', '%' .$search. '%')
            ->orWhere('user_id', 'like', '%' .$search. '%')
            ->orWhere('date', 'like', '%' .$search. '%')
            ->orWhere('price', 'like', '%' .$search. '%')
            ->orWhere('detail', 'like', '%' .$search. '%');

        } else {     // 未入力の場合
            $message = "検索キーワードを入力してください。";
            // 未入力なら、全データ表示
            $items = Item::all();
        }
          // 変数を一つ受け渡す場合はcompact関数又はwithメソッドで送信。

          $items = $query->orderBy('date')->get();

          // compactの方が可読性が高いのでそちらを使うことが多い。
      return view('morimotos.index', compact('search', 'query', 'message', 'items'));
      // view側では通常の変数名で展開可能  {{ $message }}    

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * 商品登録
     */
    public function create()
    {
        // 商品登録画面を表示
        return view('isses.create'); 
    }

    public function itemCreate(Request $request)
    {
        // 新しい商品を登録
        $item = new Item();
        $item->date = $request->date;
        $item->item_name = $request->item_name;
        $item->category_id = $request->category_id;
        $item->price = $request->price;
        $item->detail = $request->detail;
        $item->save();

        return redirect('morimotos.index');
    }
}
