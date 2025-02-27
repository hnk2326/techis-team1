{{-- ここからapp.blade.phpとダブってます。
２月２７日のスクーリングでブランチとかできるようになったら書き換えます --}}
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        @font-face {
            font-family: Meiryo;
            src:local('Meiryo'),local('メイリオ'),local('Arial');
        }

        .italic {
            font-family:Meiryo,"メイリオ",Arial;
            font-style:italic;
        }
    </style>

</head>
<body>
{{-- ここまでダブってるとこ、おわり --}}

<div id="app">

    {{-- ここからサイドバーに載せる内容 --}}
    <main class="py-4">

        {{-- <div class="side ms-4" style="width:100px;"> --}}
        <div class="side ms-4 col">
            <div class="side-inner">
                <h6 class="side-title italic">商品管理システム</h6>

                {{-- ログイン中のユーザー名を表示する
                ToDo：ベタ打ち直す==>データベースから今のユーザー名を取得する --}}
                <div class="side-user-show p-2">
                    ユーザー名<br>
                    {{-- ユーザーの名前をクリックすると、ユーザー情報の編集ページを開く
                    ToDo:user_idを編集ページに渡す？ ==> 森山さんと確認
                    ToDo:Twitterクローンみたいにポップアップをはさむ？誤クリック対策になる？ --}}
                    <a href="{{ url('/user_edit') }}" class="side-user-name">
                        テック太郎(仮)
                    </a>
                </div>

                <div class="side-page-list my-4">
                    {{-- 商品管理機能ページリスト --}}
                    <ul class="list-unstyled mt-3">
                        <li><a href="{{ url('/index') }}" class="side-subtitle nav-item">商品一覧</a></li>
                        <li class="ms-1"><a href="{{ url('/create') }}" class="side-subtitle nav-item">＞商品登録</a></li>
                    </ul>
                    {{-- ユーザー管理ページリスト --}}
                    <ul class="list-unstyled mt-3">
                        <li><a href="{{ url('/user') }}" class="side-subtitle nav-item">ユーザー一覧</a></li>
                    </ul>
                </div>

                {{-- ホーム画面へのリンク --}}
                <a href="{{ url('/home') }}">
                    <div class="side-back-home my-2" style="background-color: orange">
                            ホーム画面へ
                    </div>
                </a>

                <br><br>

                {{-- どこでもログアウトボタン --}}
                {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> --}}
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                    <button type="submit" class="my-2">ログアウト</button>
                </form>

            </div>
        </div>


    </main>
</div>
</body>
</html>
