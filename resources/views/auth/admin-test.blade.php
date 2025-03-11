@extends('layouts/app')

@section('content')

<div class="d-flex flex-column justify-content-center">

            <div class="h4">動作確認用ページです</div>

            <div class="fs-3">
                この画面が表示できていれば<span class="fw-bolder">管理者権限がある</span>ユーザーです。
            </div>

            <form action="{{ url('logout') }}" method="POST">

                @csrf
                <button type="submit">
                    ログアウトしてログイン画面にいく</p>
                </button>
            </form>
</div>

@endsection

