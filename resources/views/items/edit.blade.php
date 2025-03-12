@extends('layouts.app')

@section('content')
<div class="container">
    <div class="balance">

        <!-- 商品登録 -->
        <h4 class="mb-4">商品編集</h4>

        <form action="/itemEdit/{{$item->id}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="date" class="form-label">購入日</label></br>
                <input type="date" name="date" id="date" class="form-control" required value="{{ old('date', $item->date) }}">
            </div>

            <div class="mb-3">
                <label for="item_name" class="form-label">商品名</label></br>
                <input type="text" name="item_name" id="item_name" class="form-control" required value="{{ old('item_name', $item->item_name) }}">
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">カテゴリ</label></br>
                <select name="category_id" id="category_id" class="form-select">
                    <option value=""></option>
                    <option value="1" {{ old('category_id', $item->category_id) == 1 ? 'selected' : '' }}>1</option>
                    <option value="2" {{ old('category_id', $item->category_id) == 2 ? 'selected' : '' }}>2</option>
                    <option value="3" {{ old('category_id', $item->category_id) == 3 ? 'selected' : '' }}>3</option>
                    <option value="4" {{ old('category_id', $item->category_id) == 4 ? 'selected' : '' }}>4</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">金額</label></br>
                <input type="text" name="price" id="price" class="form-control" value="{{ old('price', $item->price) }}">
            </div>

            <div class="mb-3">
                <label for="detail" class="form-label">詳細</label></br>
                <textarea name="detail" id="detail" class="form-control" rows="3">{{ old('detail', $item->detail) }}</textarea>
            </div>

            <!-- 編集ボタンとキャンセルボタン -->
            <div class="d-grid gap-2 d-md-flex"></br>
                <button type="submit" class="btn btn-primary mb-3">編集</button>
                <button type="submit" class="btn btn-outline-dark mb-3">キャンセル</button> 
            </div>
        </form>

    </div>
</div>

@endsection