@extends('layouts.app')<!-- サイドバー -->

@section('content')
<div class="container px-5 text-bg-warning-emphasis bg-warning-subtle p-3">    

<!-- 商品情報一覧 -->
    <h5>商品一覧</h5>
    <div class="items">
        <div class="p-0">
            <div class="text-end">
                <a href="create" class="btn btn-primary-emphasis bg-primary-subtle">商品新規登録</a>
            </div>
        </div>
            <form action="index" method="GET" class="">
                <div class="input-group">

                <!-- 検索 -->
                    <p class="mb-1">{{ $message }}</p>
                </div>
                <div class="col">
                @include('items.search')<!-- 検索フォーム -->
                @if($items->isEmpty())
                    <p>検索結果が見つかりませんでした。</p>
                @else
                    <!-- セレクトボックスを設置 --> 
                    <form action="category" method="GET">
                    {{ csrf_field() }}          <!-- CSRFトークン -->
                        <select class="form-select-success form-select-sm mb-3" aria-label=".form-select-sm example" name="category">
                            <option selected>カテゴリ検索</option>
                            <option value="1" >1</option>
                            <option value="2" >2</option>
                            <option value="3" >3</option>
                            <option value="4" >4</option>
                        </select>
                        <button type="submit" class="btn btn-outline-secondary" style="padding: 2px 10px;">検索</button>
                    </form>
                        <div class="overflow-x-auto text-nowrap ">
                            <table class="table table-striped" border="1">
                                <thead>
                                    <tr>
                                        <th>カテゴリ </th>
                                        <th>ID</th>
                                        <th>USER_ID</th>
                                        <th>購入日</th>
                                        <th>商品名</th>
                                        <th>金額</th>
                                        <th>詳細</th>
                                        <th>登録日</th>
                                        <th>更新日</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $item->category_id }}</td>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->user_id }}</td>
                                        <td>{{ $item->date }}</td>
                                        <td>{{ $item->item_name }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->detail }}</td>
                                        <td>{{ $item->created_at->format('Y/m/d') }}</td>
                                        <td>{{ $item->updated_at->format('Y/m/d') }}</td>
                                        <td>
                                            <div class="action-buttons">
                                                <a href="edit/{{$item->id}}" class="btn btn-success-emphasis bg-success-subtle" style="padding: 2px 16px;">編集</a>
                                                <form method="POST" action="destroy/{{$item->id}}" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger-emphasis bg-danger-subtle" style="padding: 2px 16px;" onclick="return confirm('削除しますか？')">削除</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                @endif
                </div>    

            </form>
            <div class="d-flex justify-content-between">
                <div class="">        
                <!-- ページネーションリンクを表示 -->
                {{ $items->links('pagination::item') }}
                </div>
                <div class="">
                    <p>合計：{{ number_format($totalPrice) }}円</p>
                </div>
            </div>
    </div>
</div>
@endsection
