@include('items.errors')
<div class="col-12">
    <form action="index" method="GET" class="search-form">
    {{ csrf_field() }}          <!-- CSRFトークン -->
        <div class="row gy-0 gx-3 align-items-center">
            <div class="col-md-2">
                <label for="formGroupExampleInput" class="form-label">キーワード：　</label>
            </div>
            <div class="col-md-4">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control" id="formGroupExampleInput" placeholder="キーワードで検索できます">
            </div>
            @error('search')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="col">
                <button type="submit" class="btn btn-outline-primary" style="padding: 3px 12px;">検索</button>
                <a href="/index" class="text-decoration-none" style="padding: 3px 12px;">クリア</a>
            </div>
        </div>
    </form>
</div>
