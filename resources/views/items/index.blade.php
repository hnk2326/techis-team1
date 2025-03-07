@extends('items.layout')

@section('content')
<div class="container">

    <div class="balance">
        <h3>商品情報一覧</h3>
        <div class="items">
            <h5>商品一覧</h5>
            <div class="w-25 p-0">
                <!-- セレクトボックスを設置 --> 
                <form action="index" method="GET">
                {{ csrf_field() }}          <!-- CSRFトークン -->
                    <select class="form-select-success form-select-sm mb-3" aria-label=".form-select-sm example" name="category">
                        <option selected>カテゴリ検索</option>
                        <option value="1" >1</option>
                        <option value="2" >2</option>
                        <option value="3" >3</option>
                        <option value="4" >4</option>
                    </select>
                    <button type="submit">検索</button>
                </form>
            </div>
            
            <div class="input-group">
                <!-- <div>検索</div> -->
                <p>{{ $message }}</p>
            </div>
            <form class="">
                <div class="col">
                @include('items.search')<!-- 検索フォーム -->
                @if($items->isEmpty())
                    <p>検索結果が見つかりませんでした。</p>
                @else
                <div class="d-flex flex-row-reverse">
                        <a href="create" class="btn btn-primary mb-3">商品新規登録</a>
                </div>
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
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="edit/{{$item->id}}" class="btn btn-success" style="padding: 2px 16px;">編集</a>
                                        <form method="POST" action="destroy/{{$item->id}}" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" style="padding: 2px 16px;" onclick="return confirm('削除しますか？')">削除</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    
                    <!-- ページネーション -->
                    
                @endif
                </div>
            </form>
        </div>     
    </div>

</div>
@endsection
