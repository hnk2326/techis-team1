@extends('layouts/app')

@section('content')

    <div class="auth-container w-75 mx-auto mt-5 d-flex flex-column align-items-center">

        <h3 class="page-title fst-italic mb-5">商品管理システム</h3>

        {{-- アカウント登録失敗エラーの表示
        UserRegisterControllerから送られてきた &errorsの中身があれば表示する
        all() でforeachで使える形にして $error １つずつ格納して全て表示する --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="error-msg-list">
                    @foreach ($errors->all() as $error)
                    <li >{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{-- ここまで アカウント登録エラー --}}

        {{-- アカウント作成用のフォームを設置 --}}
        <div class="input-form-wrapper w-50 mx-auto">
            <form action="{{ url('UserRegister') }}" class="login-form" method="POST">
                @csrf

                {{-- 名前：name --}}
                <div class="mb-4">
                    <label for="name" class="form-label">名前</label>
                    <input id="name" type="text" name="name" class="w-100 border-secondary form-control" value="{{ old('name') }}" autofocus>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- メールアドレス：mail --}}
                <div class="mb-4">
                    <label for="email" class="form-label">メールアドレス</label>
                    <input id="email" type="email" name="email" class="w-100 border-secondary form-control" value="{{ old('email') }}">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- パスワード：password，password_confirmation --}}
                <div class="mb-4">
                    <label for="password" class="form-label">パスワード</label>
                    <span class="small text-secondary ms-3">※８文字～１６文字</span>
                    <input id="password" type="password" name="password" class="w-100 border-secondary form-control" value="">
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password-conf">パスワード（確認）</label>
                    <input id="password-conf" type="password" name="password_confirmation" class="w-100 border-secondary form-control" value="">
                    @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- 管理者権限付与：role --}}
                {{-- 管理者でログインしている人にだけ表示されるブロック --}}
                @can('admin')
                    {{-- チェックボックスがオフだと、コントローラーに値が送られないので、ここで一度先に、roleの値を初期化：role = 0 --}}
                    <input id="" type="hidden" name="role" value="0" >
                    <label for="apply-role" class="role-label p-2 form-label">
                        <input id="apply-role" type="checkbox" name="role" value="1" class="chk">
                        管理者
                    </label>
                @endcan
                {{-- 管理者専用 ここまで --}}

                {{-- ボタンたち --}}
                <div class="login-btn-wrapper py-2 d-grid d-md-flex justify-content-md-center">
                    <button type="submit" class="login-btn btn btn-primary w-100 m-2 mx-lg-3">アカウント登録</button>
                    <a href="{{ url('login') }}" class="d-block text-center w-100 m-2 mx-lg-3">キャンセル</a>
                </div>
            </form>

        </div>
@endsection
