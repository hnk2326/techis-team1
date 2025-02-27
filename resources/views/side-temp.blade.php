<div class="side">
    <div class="side-inner">
        <h6 class="sidebar-title ">商品管理システム</h6>

        {{-- ログイン中のユーザー名を表示する
        ToDo：ベタ打ち直す==>データベースから今のユーザー名を取得する --}}
        <div class="side-user-show" style="text-align:left;">ログイン中</div>
        <div class="side-user-show" style="text-align:left;">
            {{-- ユーザーの名前をクリックすると、ユーザー情報の編集ページを開く
            ToDo:user_idを編集ページに渡す？ ==> 森山さんと確認 --}}
            <a href="{{ url('/user_edit') }}" class="side-user-show">
                テック太郎
            </a>
        </div>

        <br><br>

        <ul>
            <li><a href="{{ url('/index') }}" class="side-subtitle nav-item">商品一覧</a></li>
            <li><a href="{{ url('/create') }}" class="side-subtitle nav-item">＞商品登録</a></li>
            <li></li>
            <li><a href="{{ url('/user') }}" class="side-subtitle nav-item">ユーザー一覧</a></li>
        </ul>

        <br><br>

        <a href="{{ url('/home') }}">
            <div class="side-back-home">
                ホーム画面へ
            </div>
        </a>

        <br><br>

        {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> --}}
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
            <button type="submit" style="width:80%;">ログアウト</button>
        </form>

    </div>
</div>
