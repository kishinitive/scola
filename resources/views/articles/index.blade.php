@extends('app')

@section('title', '記事一覧')

@section('content')
  @include('nav')
  @include('articles.toppic')
  <div class="container">
    @foreach($articles as $article)
      @include('articles.card')
    @endforeach
  </div>
  @include('footer')
@endsection
