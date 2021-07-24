<nav class="navbar navbar-expand navbar-dark bg-dark">

  <a class="navbar-brand" href="/"><i class="far mr-1"></i>Scola</a>

  <ul class="navbar-nav ml-auto d-flex align-items-center">

    {!! Form::open(['method'=>'get', 'route' => ['articles.index']]) !!}
<div class="input-group mb-2">

              <div class="form-group">
                {!! Form::text('queryText', '', ['class' => 'form-control', 'placeholder' => 'キーワードを入力']) !!}
              </div>
              <div class="form-group">
                  {!! Form::submit('Search', ['class' => 'btn btn-primary input-group-append']) !!}
              </div>
</div>
    {!! Form::close() !!}

<!-- <div class="input-group mb-2">
  <input type="text" class="form-control">
  <div class="input-group-append">
    <button type="button" class="btn btn-outline-secondary">Button</button>
  </div>
</div>-->


<!--    {!! Form::open(['method'=>'get', 'route' => ['articles.index']]) !!}

    <div class="card">
        <div class="card-body">
            <div class="row">
              <div class="form-group col-sm-6">
                {!! Form::label('queryText', 'キーワード検索', ['class' => 'display-none']) !!}
                {!! Form::text('queryText', '', ['class' => 'form-control', 'placeholder' => 'キーワードを入力']) !!}
              </div>
              <div class="form-group col-sm-2 mt-4 pt-2">
                  {!! Form::submit('Search', ['class' => 'btn btn-primary btn-block']) !!}
              </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!} -->


    @auth
    <li class="nav-item">
      <a class="nav-link" href="{{ route('articles.create') }}"><button type="button" class="btn btn-primary m-0"><i class="fas fa-pen mr-1"></i>質問する</button></a>
    </li>
    @endauth

    @auth
    <li class="nav-item">
      <a class="nav-link" href="{{ route('articles.create') }}"><i class="fas fa-pen mr-1"></i>投稿する</a>
    </li>
    @endauth


    @guest
    <li class="nav-item ">
      <a class="nav-link" href="{{ route('register') }}">ユーザー登録</a>
    </li>
    @endguest

    @guest
    <li class="nav-item">
      <a class="nav-link" href="{{ route('login') }}">ログイン</a>
    </li>
    @endguest

    @auth
    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-circle"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
        <button class="dropdown-item" type="button"
            onclick="location.href='{{ route("users.show", ["name" => Auth::user()->name]) }}'">
          マイページ
        </button>
        <div class="dropdown-divider"></div>
        <button form="logout-button" class="dropdown-item" type="submit">
          ログアウト
        </button>
      </div>
    </li>
    <form id="logout-button" method="POST" action="{{ route('logout') }}">
    @csrf
    </form>
    <!-- Dropdown -->
    @endauth

  </ul>

</nav>
