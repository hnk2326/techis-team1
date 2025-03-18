<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $totalPrice = Item::where('item_name', 'like', '%' .$search. '%') // 
            ->orWhere('id', 'like', '%' .$search. '%')
            ->orWhere('user_id', 'like', '%' .$search. '%')
            ->orWhere('date', 'like', '%' .$search. '%')
            ->orWhere('price', 'like', '%' .$search. '%')
            ->orWhere('detail', 'like', '%' .$search. '%')
            ->sum('price');
        } else {     // 未入力の場合
            $message = "検索キーワードを入力してください。";
            // 未入力なら、全データ表示
            $items = Item::all();
            $totalPrice = Item::all()->sum('price');
        }
          // 変数を一つ受け渡す場合はcompact関数又はwithメソッドで送信。

          $items = $query->orderBy('date')->paginate(10)->withQueryString();

          // compactの方が可読性が高いのでそちらを使うことが多い。
        return view('items.index', compact('search', 'query', 'message', 'items', 'totalPrice'));
        // view側では通常の変数名で展開可能  {{ $message }}    

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Item::find($id);
        $item->delete();
        
        return redirect('/index');
    }

    /**
     * 商品登録
     */
    public function create()
    {
        // 商品登録画面を表示
        return view('items.create'); 
    }

    public function itemCreate(Request $request)
    {
        // バリデーション
        $request->validate([
            'date' => 'required|date',
            'item_name' => 'required|string|max:255',
            'category_id' => ['required', new Enum(Category::class)],
            'price' => 'nullable|numeric|min:0', 
            'detail' => 'nullable|string|max:1000', 
        ]); 

        // 新しい商品を登録
        $item = new Item();
        $item->user_id = Auth::id();
        $item->date = $request->date;
        $item->item_name = $request->item_name;
        $item->category_id = $request->category_id;
        $item->price = $request->price;
        $item->detail = $request->detail;
        $item->save();

        return redirect('/index');
    }

    /**
     * 商品編集
     */
    public function edit(Request $request, $id)
    {
        // 一覧画面で指定されたIDの情報を取得
        $item = Item::find($id);

        return view('items.edit')->with([
            'item' => $item,
        ]);
    }

    public function ItemEdit(Request $request, $id)
    {
        // バリデーション
        $request->validate([
            'date' => 'required|date',
            'item_name' => 'required|string|max:255',
            'category_id' => ['required', new Enum(Category::class)],
            'price' => 'nullable|numeric|min:0', 
            'detail' => 'nullable|string|max:1000', 
        ]);

        // 既存の商品情報を取得して、編集内容を保存し一覧画面に戻る
        $item = Item::find($id);

        $item->user_id = Auth::id();
        $item->date = $request->date;
        $item->item_name = $request->item_name;
        $item->category_id = $request->category_id;
        $item->price = $request->price;
        $item->detail = $request->detail;
        $item->save();

        return redirect('/index');
    }
}
