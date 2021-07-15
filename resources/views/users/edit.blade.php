@extends('app')

@section('title', 'プロフィール更新')

@include('nav')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card-mt-3">
          <div class="card-body pt-0">
            @include('error_card_list')

            <div class="card-text">
              <form method="POST" action="{{ route('users.update', ['user' => $user, 'name' => $user->name]) }}">
                @method('PATCH')
                @csrf
                <div class="md-form">
                  <label>名前</label>
                  <input type="text" name="name" class="form-control" required value="{{ $user->name ?? old('name')}}">
                </div>
                <div class="md-form">
                  <label>メールアドレス</label>
                  <input type="text" name="email" class="form-control" required value="{{ $user->email ?? old('email') }}">
                </div>


                <div class="form-group">
                  <label>自己紹介</label>
                  <textarea name="introduction" required class="form-control" rows="8" placeholder="自己紹介">{{ $user->introduction ?? old('introduction') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-block">更新する</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@include('footer')
