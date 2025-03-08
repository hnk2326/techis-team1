@extends('layouts/app')

@section('content')

    <div class="auth-container w-75 mx-auto mt-5 d-flex flex-column align-items-center">

        <h3 class="page-title fst-italic mb-5">商品管理システム</h3>

        {{-- アカウント登録失敗エラーの表示
        UserRegisterControllerから送られてきた &errorsの中身があれば表示する
        all() でforeachで使える形にして $error １つずつ格納して全て表示する --}}
        @if ($errors->any())
        <div class="alert">
            <ul class="error-msg-list">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {{-- ここまで アカウント登録エラー --}}


        {{-- みんなが慣れてきたら消します！！ --}}
        <p class="skip-login-cheat alert alert-warning"><b>
            <span class="bg-info">あとで必ず消します！</span> <br>
            <span class="for-error" style="display:inline-block; border:solid red; font-size:80%;">
                「The email has already been taken.」エラーについて<br>
                メールアドレスでユーザーを識別しているので、メールアドレスをダブらないように変更してみてください。
            </span>
            <br>
            文字入力の手間が面倒なので、しばらく最初からログイン情報をフォームにいれています。<br>
            name: たろう<br>
            user: taro@example.com <br>
            password: taropass <br>
            <span class="bg-info">あとで必ず消します！</span>
        </b></p>
        {{-- ここまで　消します！！ --}}


        {{-- アカウント作成用のフォームを設置 --}}
        <div class="input-form-wrapper w-50 mx-auto">
            <form action="{{ url('UserRegister') }}" class="login-form" method="POST">
                @csrf

                <div class="user-form-label">名前</div>
                <input type="text" name="name" class="w-100" placeholder="名前" value="たろう" autofocus>
                <div class="user-form-label">メールアドレス</div>
                <input type="email" name="email" class="w-100" placeholder="メールアドレス" value="taro@example.com">
                <div class="user-form-label">パスワード</div>
                <input type="password" name="password" class="w-100" placeholder="パスワード" value="taropass">
                <div class="user-form-label">パスワード（確認）</div>
                <input type="password" name="password" class="w-100" placeholder="パスワード（確認）" value="taropass">

                <input type="hidden" name="role" value="0" >
                <label for="apply-role" class="role-label p-2">
                    <input type="checkbox" name="role" id="apply-role" value="1" class="chk">
                    管理者
                </label>

                <div class="login-btn-wrapper py-2 d-flex justify-content-evenly">
                    <button type="submit" class="login-btn btn btn-secondary px-2 w-25">アカウント登録</button>
                    <a href="{{ url('login') }}" class="py-1">キャンセル</a>
                </div>
            </form>
        </div>
@endsection
