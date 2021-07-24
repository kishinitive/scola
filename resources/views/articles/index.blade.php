@extends('app')

@section('title', '記事一覧')

@section('content')
  @include('nav')
  @include('articles.toppic')
  <div class="container">
    @guest
      @include('articles.search')
    @endguest

<!-- <div class="input-group mb-2">
  <input type="text" class="form-control">
  <div class="input-group-append">
    <button type="button" class="btn btn-outline-secondary">Button</button>
  </div>
</div>

<div class="input-group">
	<input type="text" class="form-control" placeholder="テキスト入力欄">
	<span class="input-group-btn">
		<button type="button" class="btn btn-default">ボタン</button>
	</span>
</div> -->

    <ul class="nav nav-tabs nav-justified mt-3">
      <li class="nav-item">
        <a class="nav-link text-muted active"
           href="{{ route('articles.index') }}">
          新着
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-muted"
           href="{{ route('articles.unsolved') }}">
          未解決
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-muted"
           href="{{ route('articles.resolved') }}">
          解決済
        </a>
      </li>
    </ul>

    @foreach($articles as $article)
      @include('articles.card')
    @endforeach
    <div class="mx-auto" style="width: 200px;">
    {{ $articles->links() }}
    </div>
  </div>
  @include('footer')
@endsection
