@extends('app')

@section('title', '記事投稿')

@section('content')
  @include('nav')
  @csrf
  <div class="container">
    <form method="POST" action="{{ route('comment.store', ['article' => $article->id]) }}">追加する</a>
}">
      <div class="form-group">
        <label></label>
        <textarea name="body" required class="form-control" rows="10" placeholder="コメント">{{ old('body') }}</textarea>
      </div>
      <div class="form-group">
        <label for="image">画像登録</label>
        <input type="file" class="form-control-file" name="image" id="image">
      </div>
      <button type="submit" class="btn btn-primary text-light btn-block">回答する</button>
    </form>
  </div>

  @include('footer')
@endsection

