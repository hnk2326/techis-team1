@extends('layouts.app')

@section('content')

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


        <style>
            .botantachi {
                height:auto;
            }
            button {
                width:150px;
                height:2rem;

            }
        </style>
        <div class="botantachi w-75 mx-auto my-4">
            <form action="{{ url('logout') }}" method="POST">
                @csrf
                <span class="fw-bold">ログアウトしてから</span>
                <button type="submit" class="overflow-visible btn btn-secondary my-2">
                    ログイン画面
                </button>
            </form>
            <span class="fw-bold">ログインしたまま</span>
                <a href="{{ url('/index') }}" class="btn btn-success mx-2" role="button">商品の一覧画面</a>
                <a href="{{ url('/create') }}" class="btn btn-success mx-2" role="button">商品の登録画面</a>
        </div>

@endsection
