@extends('layouts.app')<!-- サイドバー -->

@section('content')
<div class="container px-5 text-bg-warning-emphasis bg-warning-subtle p-3">    

<!-- 商品情報一覧 -->
    <h5>商品一覧</h5>
    @if(session('success'))
        <div class="alert alert-emphasis bg-success-subtle p-1">{{ session('success') }}</div>
    @endif
    <div class="items">
    <!-- 編集されたら”編集されました。”のメッセージを出す　　　まだ表示されない！！！！ -->
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
                        <select name="category" class="form-select-success form-select-sm mb-3" aria-label=".form-select-sm example" required>
                            <option value="" disabled selected>カテゴリ検索</option>
                            @foreach (App\Enums\Categories::options() as $value => $label)
                            <option value="{{ $value }}" >{{ $label }}</option>
                            @endforeach
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
                                        <td>{{ \App\Enums\Categories::tryFrom($item->category_id)?->label() }}</td>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->user_id }}</td>
                                        <td>{{ $item->date->format('Y/m/d') }}</td>
                                        <td>{{ $item->item_name }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->detail }}</td>
                                        <td>{{ $item->created_at->format('Y/m/d') }}</td>
                                        <td>{{ $item->updated_at->format('Y/m/d') }}</td>
                                        <td>
                                            <div class="action-buttons">
                                                <a href="edit/{{$item->id}}" class="btn btn-success-emphasis bg-success-subtle" style="padding: 2px 16px;">編集</a>
                                                <form method="POST" action="itemDestroy/{{$item->id}}" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" value="削除" class="btn btn-danger-emphasis bg-danger-subtle" style="padding: 2px 16px;" onclick="return confirm('削除しますか？')">
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

            <p class="text-end">総数：{{ number_format($totalId) }}件   合計：{{ number_format($totalPrice) }}円</p>

        </div>
    </div>
</div>
@endsection