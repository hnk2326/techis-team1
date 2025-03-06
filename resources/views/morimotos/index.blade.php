@extends('morimotos.layout')

@section('content')
<div class="container">

    <div class="balance">
        <h2>商品情報一覧</h2>
        <div class="items">
            <h4>商品一覧</h4>

                <!-- セレクトボックスを設置 -->
                <select name="category" id="category">
                <option selected></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
                <!-- <div>検索</div> -->
                <p>{{ $message }}</p>
                @include('morimotos.search')<!-- 検索フォーム -->
                @if($items->isEmpty())
                    <p>検索結果が見つかりませんでした。</p>
                @else
                    <div class="register-container">
                        <a href="create" class="new-register-btn">商品新規登録</a>
                    </div>
                    <div class="table-wrapper">
                        <table class="item-table">
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
                                    <th>ボタン</th>
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
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="edit/{{$item->id}}" class="btn btn-edit">編集</a>
                                            <form method="POST" action="destroy/{{$item->id}}" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-delete" onclick="return confirm('削除しますか？')">削除</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>  
                    <!-- ページネーション -->
                    
                @endif
        </div>     
    </div>

</div>
@endsection
