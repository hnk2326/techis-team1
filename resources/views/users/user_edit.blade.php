@extends('layouts.app')

@section('content')
<div class="container">
    <h2>ユーザー編集</h2>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">名前</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">メールアドレス</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">パスワード</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">パスワード確認</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        
        <button type="submit" class="btn btn-success">更新</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">キャンセル</a>
    </form>
</div>
@endsection
