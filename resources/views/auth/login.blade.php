{{-- <!-- /view/layouts/app.blade.php をテンプレートとして読み込む --> --}}
@extends('layouts/app')

{{--
    上記テンプレート内の ＠yield('★★★★') の部分に
        ＠section(' ★★★★ ')
        ＠endsection
    で囲まれた部分を差し込むようにくっつけて表示させる。
    テンプレートの ＠yield('content') の上に書かれている<HTML><HEAD><BODY>や
    <div>などのタグや設定などをそのまま使い（継承）し、section～endsection内のHTMLを表示する
--}}

@section('content')

    <div class="auth-container w-75 mx-auto mt-5 d-flex flex-column align-items-center">

        <h3 class="page-title fst-italic mb-5">商品管理システム</h3>

            {{-- ログイン失敗エラーの表示
            AuthControllerから送られてきた &errorsの中身があれば表示する
            all() でforeachで使える形にして $error １つずつ格納して全て表示する --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="error-msg-list">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{-- ここまで　ログインエラー --}}


        {{-- みんなが慣れてきたら消します！！ --}}
        <p class="skip-login-cheat alert alert-warning"><b>
            <span class="bg-info">あとで必ず消します！</span> <br>
                        ログインの手間が面倒なので、しばらく最初からログイン情報をフォームにいれています。<br>
                        user: taro@example.com <br>
                        password: taropass <br>
            <span class="bg-info">あとで必ず消します！</span>
        </b></p>
        {{-- ここまで　消します！！ --}}


        {{-- ログイン用のフォームを設置 --}}
        <div class="input-form-wrapper w-50 mx-auto">
            <form action="{{ url('login') }}" class="login-form" method="POST">
                @csrf

                <div class="user-form-label">メールアドレス</div>
                <input type="email" name="email" class="w-100" placeholder="メールアドレス" value="taro@example.com" autofocus>
                <div class="user-form-label">パスワード</div>
                <input type="password" name="password" class="w-100" placeholder="パスワード" value="taropass">

                <div class="login-btn-wrapper py-2 d-flex justify-content-evenly">
                    <button type="submit" class="login-btn btn btn-secondary w-25">ログイン</button>
                    <a href="{{ url('UserRegister') }}" class="btn btn-secondary w-25" role="button">登録</a>
                </div>
            </form>
        </div>
    </div>

@endsection
