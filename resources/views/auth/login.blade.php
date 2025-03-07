<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- bootstrapを適用 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    {{-- bootstrapでキレイにならないときはオリジナルstyle.cssを使う --}}
    <link rel="stylesheet" href="{{ asset('/css/style.css')}}">

</head>
<body>

    <div id="app">
        <div class="container">
            <div class="auth-wrapper">

                <h3 class="page-title italic">商品管理システム</h3>
                {{-- ログイン用のフォームを設置 --}}

                <form action="{{ url('login') }}" class="login-form form" method="POST">
                    {{-- ログイン失敗エラーの表示
                    AuthControllerから送られてきた &errorsの中身があれば表示する
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

                    @csrf <!-- CSRF対策のlaravel bladeの短縮ディレクティブ -->
                    {{-- みんなが慣れてきたら消します！！ --}}
                    <p><b>
                        <span style="color:brown; background-color:yellowgreen">あとで必ず消します！</span> <br>
                        ログインの手間が面倒なので、しばらく最初からログイン情報をフォームにいれています。<br>
                        user: taro@example.com <br>
                        password: taropass <br>
                        <span style="color:brown; background-color:yellowgreen">あとで必ず消します！</span>
                    </b></p>
                    {{-- ここまで　みんなが慣れてきたら消します！！ --}}


                    <div class="user-form-label">メールアドレス</div>
                    <input type="email" name="email" placeholder="メールアドレス" value="taro@example.com" >
                    <div class="user-form-label">パスワード</div>
                    <input type="password" name="password" placeholder="パスワード" value="taropass">

                    <div class="login-btn-wrapper">
                        <button type="submit" class="btn login-btn">ログイン</button>
                        <a href="{{ url('UserRegister') }}">登録</a>
                    </div>
                </form>
            </div>
        </div>

    </div>


</body>
</html>
