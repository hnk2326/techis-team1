<!-- サイドバーの全体ブロック -->
<div class="side-container
        h-100
        d-flex
        flex-column
        py-3
        bg-secondary-subtle
        text-reset
        ">
    <!-- サイドバーメインタイトル -->
    <H6 class="side-title fst-italic text-center py-3">商品管理システム</H6>


    <!-- ログインユーザー表示エリア -->
    <div class="side-user-show w-75 mx-auto">
        ユーザー名<br>
        {{-- ユーザーの名前をクリックすると、ユーザー情報の編集ページを開く？
        ToDo:user_idを編集ページに渡す？ ==> 森山さんと確認  --}}
        <a href="{{ url('/user_edit') }}" class="side-user-name fw-bolder">
            @auth <!-- ＠if('ログイン中？') の合体便利ディレクティブ！  -->
                {{ Auth::user()->name }} <!-- Laravelの機能で、今のユーザーの情報を取得するファサード -->
            @else
                ｛ログアウト状態｝
            @endauth
        </a>
    </div>


    {{-- 各ページへのリンクエリア --}}
    <div class="side-page-list-wrapper nav-wrapper my-5 ms-4 ">
        {{-- 商品管理機能ページたち --}}
        <ul class="list-unstyled my-4">
            <li>
                <a href="{{ url('/index') }}" class="side-subtitle">商品一覧</a>
            </li>
            <li>
                <a href="{{ url('/create') }}" class="side-subtitle branch ms-1">＞商品 新規登録</a>
            </li>
        </ul>
        {{-- アカウント管理ページたち --}}
        <ul class="list-unstyled my-4">
            <li>
                <a href="{{ url('/user') }}" class="side-subtitle">ユーザー一覧</a>
            </li>
            <li>
                <a href="{{ url('/UserRegister') }}" class="side-subtitle branch ms-1">＞アカウント登録</a>
            </li>
        </ul>
    </div>


    {{-- サイドバーの下段エリア --}}
    <div class="side-bottom-wrapper w-100 d-flex flex-column align-items-center">
        {{-- ホーム画面へのリンク --}}
        {{-- <a href="{{ url('/home') }}" class="side-back-home-link d-block w-100 py-2 text-center bg-warning"> --}}
        <a href="{{ url('/home') }}" class="side-back-home-link btn btn-warning w-75 align-items-center" role="button">
            ホーム画面へ
        </a>

        {{-- どこでもログアウトボタン クリック押し下げでログイン画面へ --}}
        <form class="logout-form w-75 py-3" action="{{ url('logout') }}" method="POST">
            @csrf
            <!-- <button type="submit" class="side-logout-btn py-2 my-2 w-100">ログアウト</button> -->
            <button type="submit" class="side-logout-btn btn btn-outline-secondary w-100 ">ログアウト</button>
        </form>
    </div>


</div>
