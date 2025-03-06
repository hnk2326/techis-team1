<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <!-- CSRF -->
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
                {{-- アカウント作成用のフォームを設置 --}}
                <form action="{{ url('UserRegister') }}" class="login-form form" method="POST">
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

                    {{-- みんなが慣れてきたら消します！！ --}}
                    <p><b>
                        <span style="color:brown; background-color:yellowgreen">あとで必ず消します！</span> <br>
                        <div class="for-error" style="display:inline-block; border:solid red; font-size:80%;">
                            「The email has already been taken.」エラーについて<br>
                            メールアドレスでユーザーを識別しているので、メールアドレスをダブらないように変更してみてください。
                        </div>
                        <br>
                        ログインの手間が面倒なので、しばらく最初からログイン情報をフォームにいれています。<br>
                        name: たろう<br>
                        user: taro@example.com <br>
                        password: taropass <br>
                        <span style="color:brown; background-color:yellowgreen">あとで必ず消します！</span>
                    </b></p>
                    {{-- ここまで　みんなが慣れてきたら消します！！ --}}

                    @csrf
                    <div class="user-form-label">名前</div>
                    <input type="text" name="name" placeholder="名前" value="たろう">
                    <div class="user-form-label">メールアドレス</div>
                    <input type="email" name="email" placeholder="メールアドレス" value="taro@example.com">
                    <div class="user-form-label">パスワード</div>
                    <input type="password" name="password" placeholder="パスワード" value="taropass">
                    <div class="user-form-label">パスワード（確認）</div>
                    <input type="password" name="password" placeholder="パスワード（確認）" value="taropass">

                    <input type="hidden" name="role" value="0" >
                    <label for="apply-role" class="role-label">
                        <input type="checkbox" name="role" id="apply-role" value="1" class="chk">
                        管理者
                    </label>

                    <div class="login-btn-wrapper">
                        <button type="submit" class="btn login-btn">アカウント登録</button>
                        <a href="{{ url('login') }}">キャンセル</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</form>



</body>
</html>
