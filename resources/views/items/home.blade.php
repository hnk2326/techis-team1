<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <p>
        ホーム画面(仮)、コンフリクトしたら全部消してください（月森
    </p>

    {{-- ログイン失敗エラーの表示
    AuthControllerから送られてきた &errorsの中身があれば表示する
    all() でforeachで使える形にして $error １つずつ格納して全て表示する --}}
    @if ($errors->any()) <!-- 何かエラーがあれば以下を実行 -->
    <div class="alert">
        <ul class="error-msg-list">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @else <!-- エラーがなければ以下を実行 -->
        ログインに成功しました。<br>（もしくは直接このページを表示しました）
    @endif
    <p>
        <form action="{{ url('logout') }}" method="POST">

            @csrf
            <button type="submit">
                ログアウトしてログイン画面にいく</p>
            </button>
        </form>
</body>
</html>
