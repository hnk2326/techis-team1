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
                <input type="date" name="date" id="date" class="w-75 border-secondary form-control" value="{{ old('date', optional($item->date)->format('Y-m-d')) }}">
                @error('date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="item_name" class="form-label">商品名</label></br>
                <input type="text" name="item_name" id="item_name" class="w-75 border-secondary form-control" value="{{ old('item_name', $item->item_name) }}">
                @error('item_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">カテゴリ</label></br>
                <select name="category_id" id="category_id" class="w-75 border-secondary form-select">
                    @foreach (App\Enums\Categories::options() as $value => $label)
                        <option value="{{ $value }}" @selected(old('category_id', $item->category_id) == $value)>{{ $label }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">金額</label></br>
                <input type="text" name="price" id="price" class="w-75 border-secondary form-control" value="{{ old('price', $item->price) }}">
                @error('price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="detail" class="form-label">詳細</label></br>
                <textarea name="detail" id="detail" class="w-75 border-secondary form-control" rows="3">{{ old('detail', $item->detail) }}</textarea>
                @error('detail')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- 編集ボタンとキャンセルボタン -->
            <div class="d-grid gap-5 d-md-flex"></br>
                <button type="submit" class="btn btn-primary w-25">編集</button>
                <a href="{{ route('cancel') }}" onclick="sessionStorage.removeItem('laravel_session');" class="btn btn-outline-dark w-25">キャンセル</a>
            </div>
        </form>

    </div>
</div>

@endsection