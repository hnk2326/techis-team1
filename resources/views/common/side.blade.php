<!-- サイドバーの全体ブロック -->
<div class="side-container
        h-100
        py-3
        ps-1
        bg-secondary-subtle
        d-flex
        flex-column
        ">
        {{-- h-100
        py-3
        bg-secondary-subtle
        text-reset
        "> --}}

    <!-- サイドバーメインタイトル -->
    <H6 class="side-title fst-italic text-center py-3">商品管理システム</H6>


    <!-- ログインユーザー表示エリア -->
    <div class="side-user-show w-75 text-center mx-auto row py-2">
        <div class="mb-1">ユーザー名</div>

        <!-- Laravelの機能で、今のユーザーの情報を取得するファサード -->
        <div class="fw-bolder mb-1">{{ Auth::user()->name }}</div>

        {{-- ユーザーの名前をクリックすると、ユーザー情報の編集ページを開く？ --}}
        {{-- <a href="{{ url('/user/Auth::user()->id/edit') }}" class="side-user-name fw-bolder"> --}}
            {{-- @auth <!-- ＠if('ログイン中？') の合体便利ディレクティブ！  -->
                {{ Auth::user()->name }} <!-- Laravelの機能で、今のユーザーの情報を取得するファサード -->
            @else
                ｛ログアウト状態｝
            @endauth --}}
        {{-- </a> --}}
    </div>


    {{-- 各ページへのリンクエリア --}}
    <div class="side-page-list-wrapper nav-wrapper my-5 mx-auto row w-75 ">
        {{-- 商品管理機能ページたち --}}
        <ul class="list-unstyled my-4">
            <li>
                <a href="{{ url('/index') }}" class="side-subtitle">商品一覧</a>
            </li>
            <li>
                <a href="{{ url('/create') }}" class="side-subtitle branch ms-2">＞商品 新規登録</a>
            </li>
        </ul>
        {{-- アカウント管理ページたち --}}
        @can('admin')
            <ul class="list-unstyled my-4">
                <li>
                    <a href="{{ url('/user') }}" class="side-subtitle">ユーザー一覧</a>
                </li>
                <li>
                    <a href="{{ url('/UserRegister') }}" class="side-subtitle branch ms-2">＞アカウント登録</a>
                </li>
            </ul>
        @endcan
    </div>


    {{-- サイドバーの下段エリア --}}
    <div class="side-bottom-wrapper w-75 mx-auto">
        {{-- ホーム画面へのリンク --}}
        <a href="{{ url('/home') }}" class="side-back-home-link btn btn-warning w-100 my-1 " role="button">
            ホーム画面へ
        </a>

        {{-- どこでもログアウトボタン クリック押し下げでログイン画面へ --}}
        <form class="logout-form" action="{{ url('logout') }}" method="POST">
            @csrf
            <button type="submit" class="side-logout-btn btn btn-outline-secondary w-100 my-1">ログアウト</button>
        </form>
    </div>


</div>
