<!doctype html>
{{-- /config/app.php で設定した言語設定を参照して、セットする --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <!-- CSRF保護のため、laravelはこれが無いと危険として動作しない -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- タイトルの自動読み込み
        ブラウザのブックマークやブラウザのページタイトルとして表示されるもの
        /config/app.php で設定したタイトルを参照する
        もし上記で空欄の場合は 第二引数の「Laravel」をタイトルになる  -->
    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- bootstrapを使うためのCDN ver 5.3 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    {{-- bootstrap で調整できない箇所はオリジナルの /team1/public/css/style.css で調整します --}}
    <link rel="stylesheet" href="{{ asset('/css/style.css')}}">

</head>
<body>

    <!-- 画面全体のエリアブロック -->
    <div id="app" class="allWrapper d-flex vh-100">


        {{-- サイドバーエリア --}}
        @auth  {{-- サイドバーが出るのはログイン後のみなので、auth限定で表示 --}}
            @section('sidebar')
                <div id="sidebar" class="sidebar-main col-md-2 ">

                    @include('common.side') <!-- サイドバー読み込み -->
                </div>
            @show
        @endauth
        {{-- サイドバー おわり --}}


        <!--  メインコンテンツエリア  -->
        <main class="py-4 overflow-y-auto" style="flex:1;" >
            @yield('content')
        </main>
        <!--  ここまで メインコンテンツ  -->

    </div>
</body>
</html>

