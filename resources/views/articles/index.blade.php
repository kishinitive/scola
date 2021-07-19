@extends('app')

@section('title', '記事一覧')

@section('content')
  @include('nav')
  @include('articles.toppic')
  <div class="container">
    @include('articles.search')
    @foreach($articles as $article)
      @include('articles.card')
    @endforeach
    <div class="mx-auto" style="width: 200px;">
    {{ $articles->links() }}
    </div>
  </div>
  @include('footer')
@endsection
