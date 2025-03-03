<!-- バリデーションエラーの表示 -->
@include('morimotos.errors')

<form action="index" method="GET" class="search-form">
{{ csrf_field() }}          <!-- CSRFトークン -->
    <label for="search">キーワード：　</label>
    <input type="text" name="search" value="{{ request('search') }}"  placeholder="キーワードで検索できます" class="search-input">

        @error('search')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    <button type="submit" class="btn btn-outline-primary">検索</button>
    <a href="/index" class="clear">クリア</a>

</form> 