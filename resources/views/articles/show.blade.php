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
  <div class="container">
    <form method="POST" action="{{ route('comments.store', ['article' => $article]) }}" enctype='multipart/form-data'>
    @csrf
    @include('comments.create')
    <button type="submit" class="btn btn-primary text-light btn-block">回答する</button>
    </form>
  </div>

  @include('footer')
@endsection
