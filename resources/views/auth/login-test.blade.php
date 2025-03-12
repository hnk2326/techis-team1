@extends('layouts/app')

@section('content')

<div class="d-flex flex-column align-items-center">

            <div class="h4">動作確認用ページです</div>

            <div class="py-4 my-4">
                この画面が表示できていれば<br>
                <span class="fw-bolder">ログインに成功、ログイン状態</span>です。
            </div>

            @can('admin')
                <div class="py-4 my-4">
                    <h5>あなたは管理者です</h5>
                    このメッセージが表示されていれば<br>
                    <span class="fw-bolder">管理者権限がある</span>ユーザーです。
                </div>
            @endcan

            <div class="py-4 my-4 d-flex flex-column align-items-center">
                <a href="{{ url('admin-test') }}" class="block fw-bold fs-4">管理者権限の専用ページを開く</a>
                <div class="text-danger">※管理者権限が無いユーザーだと403エラー画面が出ます。それが正常です。※</div>
            </div>

            <form action="{{ url('logout') }}" method="POST">

                @csrf
                <button type="submit">
                    ログアウトしてログイン画面にいく</p>
                </button>
            </form>
</div>

@endsection

