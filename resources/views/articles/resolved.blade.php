@extends('app')

@section('title', '解決済質問一覧')

@section('content')
  @include('nav')
  @include('articles.toppic')
  <div class="container">


    <ul class="nav nav-tabs nav-justified mt-5">
      <li class="nav-item">
        <a class="nav-link text-muted"
           href="/">
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
        <a class="nav-link text-muted active"
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


