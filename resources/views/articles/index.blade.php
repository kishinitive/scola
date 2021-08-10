@extends('app')

@section('title', '記事一覧')

@section('content')
  @include('nav')
  @include('articles.toppic')

  @guest
  <p class="text-center fs-2">早速質問してみよう！</p>
  <div class="form-group row justify-content-center mb-5">
    <div>
      <button class="btn btn-primary">
        <a href="{{ route('login') }}" class="text-white">ログイン</a>
      </button>
      <button class="btn btn-success">
        <a href="{{ route('login.guest') }}" class="text-white">ゲストログイン</a>
      </button>
    </div>
  </div>
  @endguest


  <div class="container">
    <ul class="nav nav-tabs nav-justified mt-5">
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
    <div class="mx-auto mt-4" style="width: 200px;">
    {{ $articles->links() }}
    </div>
  </div>
  @include('footer')
@endsection
