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
{{--  @csrf
  <div class="container">
   <form method="POST" action="{{ route('comment.store', ['article' => $article->id]) }}">
      @include('comments.commentedit')
      <button type="submit" class="btn btn-primary text-light btn-block">回答する</button>
    </form>
  </div> --}}
  @include('footer')
@endsection
