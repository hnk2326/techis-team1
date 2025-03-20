@extends('layouts.app')

@section('content')
<div class="container">
    <div class="balance">

        <!-- 商品登録 -->
        <h4 class="mb-4">商品登録</h4>

        <form action="/itemCreate" method="POST">
            @csrf
            <div class="mb-3">
                <label for="date" class="form-label">購入日</label></br>
                <input type="date" name="date" id="date" class="w-75 border-secondary form-control" value="{{ old('date') }}" autofocus>
                @error('date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="item_name" class="form-label">商品名</label></br>
                <input type="text" name="item_name" id="item_name" class="w-75 border-secondary form-control" value="{{ old('item_name') }}">
                @error('item_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">カテゴリ</label></br>
                <select name="category_id" id="category_id" class="w-75 border-secondary form-select" required>
                    <option value="" disabled selected></option>
                    <!-- 日本語でカテゴリの名前が入るように追加しました。 Enumを使う方法です（Laravel９以上なら標準機能として使えます。）-->
                    @foreach (App\Enums\Categories::options() as $value => $label)
                        <option value="{{ $value }}" >{{ $label }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">金額</label></br>
                <input type="text" name="price" id="price" class="w-75 border-secondary form-control" value="{{ old('price') }}">
                @error('price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="detail" class="form-label">詳細</label></br>
                <textarea name="detail" id="detail" class="w-75 border-secondary form-control" rows="3">{{ old('detail') }}</textarea>
                @error('detail')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- 登録ボタン -->
            <button type="submit" class="btn btn-primary w-25">登録</button>
        </form>

    </div>
</div>

@endsection