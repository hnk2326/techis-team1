<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

        動作確認用ページです<br>
        この画面が表示できていればログインに成功、ログイン状態です。<br>
        <form action="{{ url('logout') }}" method="POST">

            @csrf
            <button type="submit">
                ログアウトしてログイン画面にいく</p>
            </button>
        </form>
</body>
</html>
