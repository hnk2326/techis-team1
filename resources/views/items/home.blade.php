@extends('layouts.app')

@section('content')

<div class="main-wall h-100 w-100 py-4">

    <div class="home-container d-flex flex-column
         col-md-10 mx-auto
         col-sm-11">

        <h1 class="fs-md-1 fs-sm-5 py-4">商品管理システム</h1>

        <div class="info card fw-bold col-xl-3 col-md-6 col-sm-9 mx-sm-0 mx-3 bg-danger bg-opacity-10 ">
            <h5 class=" card-header border-0 bg-danger bg-opacity-50 fs-6 text-light">メッセージ</h5>

            <div class="card-body">
                <small class="">

                    @if (session('login_done'))
                        {{ session('login_done') }}
                        @can('admin')
                            <div class="admin">
                                あなたは管理者です
                            </div>
                        @endcan

                    @else
                        メッセージはありません。
                    @endif

                </small>
            </div>
        </div>

    </div>
</div>

@endsection
