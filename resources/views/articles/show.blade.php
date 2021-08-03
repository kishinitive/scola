@extends('app')

@section('title', '記事詳細')

@section('content')
  @include('nav')
  <div class="container">
    @include('articles.card')
  </div>
  <div class="container">
    @foreach($comments as $comment)
      @include('comments.card')
    @endforeach
  </div>

  @if( Auth::id() === $article->user_id && $article->status === '未解決')
    <div class="container">
    <div class="card mt-3">
      <div class="card-body pt-0">
        @include('error_card_list')
        <div class="card-text">
          <p class="mt-3">疑問が解決した時は、下のボタンを押しましょう！</p>
          <a class="btn btn-primary" href="{{ route('articles.getresolved', ['article' => $article]) }}"><i class="fas fa-lightbulb"></i>
            解決済にする
          </a>
        </div>
      </div>
    </div>
    </div>
  @endif

  <div class="container">
    <form method="POST" action="{{ route('comments.store', ['article' => $article]) }}" enctype='multipart/form-data'>
    @csrf
    @include('comments.create')
    <button type="submit" class="btn btn-primary text-light btn-block">回答する</button>
    </form>
  </div>

  @include('footer')
@endsection
